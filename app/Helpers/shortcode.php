<?php

/**
 * Container for storing shortcode tags and their hook to call for the shortcode.
 *
 * @since 2.5.0
 *
 * @name $shortcode_tags
 * @var array
 * @global array $shortcode_tags
 */
$shortcode_tags = array([
    'hello' => "hai"
]);

function hai($attrs)
{
    return $attrs['title'];
}

function add_shortcode($tag, $callback)
{
    global $shortcode_tags;

    if ('' === trim($tag)) {
        dd("Invalid shortcode name: Empty name given.");
        return;
    }

    if (0 !== preg_match('@[<>&/\[\]\x00-\x20=]@', $tag)) {
        dd('Invalid shortcode name: %1$s. Do not use spaces or reserved characters');
        return;
    }

    $shortcode_tags[$tag] = $callback;
}

function shortcode_exists($tag)
{
    global $shortcode_tags;
    return array_key_exists($tag, $shortcode_tags);
}


function do_shortcode($content, $ignore_html = false)
{
    global $shortcode_tags;

    if (false === strpos($content, '[')) {
        return $content;
    }

    if (empty($shortcode_tags) || !is_array($shortcode_tags)) {
        return $content;
    }

    // Find all registered tag names in $content.
    preg_match_all('@\[([^<>&/\[\]\x00-\x20=]++)@', $content, $matches);
    $tagnames = array_intersect(array_keys($shortcode_tags), $matches[1]);

    if (empty($tagnames)) {
        return $content;
    }

    $content = do_shortcodes_in_html_tags($content, $ignore_html, $tagnames);

    $pattern = get_shortcode_regex($tagnames);
    $content = preg_replace_callback("/$pattern/", 'do_shortcode_tag', $content);

    // Always restore square braces so we don't break things like <!--[if IE ]>.
    $content = unescape_invalid_shortcodes($content);

    return $content;
}

function get_shortcode_regex($tagnames = null)
{
    global $shortcode_tags;

    if (empty($tagnames)) {
        $tagnames = array_keys($shortcode_tags);
    }
    $tagregexp = implode('|', array_map('preg_quote', $tagnames));

    // WARNING! Do not change this regex without changing do_shortcode_tag() and strip_shortcode_tag().
    // Also, see shortcode_unautop() and shortcode.js.

    // phpcs:disable Squiz.Strings.ConcatenationSpacing.PaddingFound -- don't remove regex indentation
    return '\\['                             // Opening bracket.
        . '(\\[?)'                           // 1: Optional second opening bracket for escaping shortcodes: [[tag]].
        . "($tagregexp)"                     // 2: Shortcode name.
        . '(?![\\w-])'                       // Not followed by word character or hyphen.
        . '('                                // 3: Unroll the loop: Inside the opening shortcode tag.
        .     '[^\\]\\/]*'                   // Not a closing bracket or forward slash.
        .     '(?:'
        .         '\\/(?!\\])'               // A forward slash not followed by a closing bracket.
        .         '[^\\]\\/]*'               // Not a closing bracket or forward slash.
        .     ')*?'
        . ')'
        . '(?:'
        .     '(\\/)'                        // 4: Self closing tag...
        .     '\\]'                          // ...and closing bracket.
        . '|'
        .     '\\]'                          // Closing bracket.
        .     '(?:'
        .         '('                        // 5: Unroll the loop: Optionally, anything between the opening and closing shortcode tags.
        .             '[^\\[]*+'             // Not an opening bracket.
        .             '(?:'
        .                 '\\[(?!\\/\\2\\])' // An opening bracket not followed by the closing shortcode tag.
        .                 '[^\\[]*+'         // Not an opening bracket.
        .             ')*+'
        .         ')'
        .         '\\[\\/\\2\\]'             // Closing shortcode tag.
        .     ')?'
        . ')'
        . '(\\]?)';                          // 6: Optional second closing brocket for escaping shortcodes: [[tag]].
    // phpcs:enable
}

function do_shortcode_tag($m)
{
    global $shortcode_tags;

    // Allow [[foo]] syntax for escaping a tag.
    if ('[' === $m[1] && ']' === $m[6]) {
        return substr($m[0], 1, -1);
    }

    $tag  = $m[2];
    $attr = shortcode_parse_atts($m[3]);

    if (!is_callable($shortcode_tags[$tag])) {
        _doing_it_wrong(
            __FUNCTION__,
            /* translators: %s: Shortcode tag. */
            sprintf(__('Attempting to parse a shortcode without a valid callback: %s'), $tag),
            '4.3.0'
        );
        return $m[0];
    }

    /**
     * Filters whether to call a shortcode callback.
     *
     * Returning a non-false value from filter will short-circuit the
     * shortcode generation process, returning that value instead.
     *
     * @since 4.7.0
     *
     * @param false|string $return Short-circuit return value. Either false or the value to replace the shortcode with.
     * @param string       $tag    Shortcode name.
     * @param array|string $attr   Shortcode attributes array or empty string.
     * @param array        $m      Regular expression match array.
     */
    // $return = apply_filters('pre_do_shortcode_tag', false, $tag, $attr, $m);
    // if (false !== $return) {
    //     return $return;
    // }

    $content = isset($m[5]) ? $m[5] : null;

    $output = $m[1] . call_user_func($shortcode_tags[$tag], $attr, $content, $tag) . $m[6];

    return $output;
    // return apply_filters('do_shortcode_tag', $output, $tag, $attr, $m);
}

function do_shortcodes_in_html_tags($content, $ignore_html, $tagnames)
{
    // Normalize entities in unfiltered HTML before adding placeholders.
    $trans   = array(
        '&#91;' => '&#091;',
        '&#93;' => '&#093;',
    );
    $content = strtr($content, $trans);
    $trans   = array(
        '[' => '&#91;',
        ']' => '&#93;',
    );

    $pattern = get_shortcode_regex($tagnames);
    $textarr = wp_html_split($content);

    foreach ($textarr as &$element) {
        if ('' === $element || '<' !== $element[0]) {
            continue;
        }

        $noopen  = false === strpos($element, '[');
        $noclose = false === strpos($element, ']');
        if ($noopen || $noclose) {
            // This element does not contain shortcodes.
            if ($noopen xor $noclose) {
                // Need to encode stray '[' or ']' chars.
                $element = strtr($element, $trans);
            }
            continue;
        }

        if ($ignore_html || '<!--' === substr($element, 0, 4) || '<![CDATA[' === substr($element, 0, 9)) {
            // Encode all '[' and ']' chars.
            $element = strtr($element, $trans);
            continue;
        }

        $attributes = wp_kses_attr_parse($element);
        if (false === $attributes) {
            // Some plugins are doing things like [name] <[email]>.
            if (1 === preg_match('%^<\s*\[\[?[^\[\]]+\]%', $element)) {
                $element = preg_replace_callback("/$pattern/", 'do_shortcode_tag', $element);
            }

            // Looks like we found some crazy unfiltered HTML. Skipping it for sanity.
            $element = strtr($element, $trans);
            continue;
        }

        // Get element name.
        $front   = array_shift($attributes);
        $back    = array_pop($attributes);
        $matches = array();
        preg_match('%[a-zA-Z0-9]+%', $front, $matches);
        $elname = $matches[0];

        // Look for shortcodes in each attribute separately.
        foreach ($attributes as &$attr) {
            $open  = strpos($attr, '[');
            $close = strpos($attr, ']');
            if (false === $open || false === $close) {
                continue; // Go to next attribute. Square braces will be escaped at end of loop.
            }
            $double = strpos($attr, '"');
            $single = strpos($attr, "'");
            if ((false === $single || $open < $single) && (false === $double || $open < $double)) {
                /*
				 * $attr like '[shortcode]' or 'name = [shortcode]' implies unfiltered_html.
				 * In this specific situation we assume KSES did not run because the input
				 * was written by an administrator, so we should avoid changing the output
				 * and we do not need to run KSES here.
				 */
                $attr = preg_replace_callback("/$pattern/", 'do_shortcode_tag', $attr);
            } else {
                // $attr like 'name = "[shortcode]"' or "name = '[shortcode]'".
                // We do not know if $content was unfiltered. Assume KSES ran before shortcodes.
                $count    = 0;
                $new_attr = preg_replace_callback("/$pattern/", 'do_shortcode_tag', $attr, -1, $count);
                if ($count > 0) {
                    // Sanitize the shortcode output using KSES.
                    $new_attr = wp_kses_one_attr($new_attr, $elname);
                    if ('' !== trim($new_attr)) {
                        // The shortcode is safe to use now.
                        $attr = $new_attr;
                    }
                }
            }
        }
        $element = $front . implode('', $attributes) . $back;

        // Now encode any remaining '[' or ']' chars.
        $element = strtr($element, $trans);
    }

    $content = implode('', $textarr);

    return $content;
}

function unescape_invalid_shortcodes($content)
{
    // Clean up entire string, avoids re-parsing HTML.
    $trans = array(
        '&#91;' => '[',
        '&#93;' => ']',
    );

    $content = strtr($content, $trans);

    return $content;
}

function get_shortcode_atts_regex()
{
    return '/([\w-]+)\s*=\s*"([^"]*)"(?:\s|$)|([\w-]+)\s*=\s*\'([^\']*)\'(?:\s|$)|([\w-]+)\s*=\s*([^\s\'"]+)(?:\s|$)|"([^"]*)"(?:\s|$)|\'([^\']*)\'(?:\s|$)|(\S+)(?:\s|$)/';
}

function shortcode_parse_atts($text)
{
    $atts    = array();
    $pattern = get_shortcode_atts_regex();
    $text    = preg_replace("/[\x{00a0}\x{200b}]+/u", ' ', $text);
    if (preg_match_all($pattern, $text, $match, PREG_SET_ORDER)) {
        foreach ($match as $m) {
            if (!empty($m[1])) {
                $atts[strtolower($m[1])] = stripcslashes($m[2]);
            } elseif (!empty($m[3])) {
                $atts[strtolower($m[3])] = stripcslashes($m[4]);
            } elseif (!empty($m[5])) {
                $atts[strtolower($m[5])] = stripcslashes($m[6]);
            } elseif (isset($m[7]) && strlen($m[7])) {
                $atts[] = stripcslashes($m[7]);
            } elseif (isset($m[8]) && strlen($m[8])) {
                $atts[] = stripcslashes($m[8]);
            } elseif (isset($m[9])) {
                $atts[] = stripcslashes($m[9]);
            }
        }

        // Reject any unclosed HTML elements.
        foreach ($atts as &$value) {
            if (false !== strpos($value, '<')) {
                if (1 !== preg_match('/^[^<]*+(?:<[^>]*+>[^<]*+)*+$/', $value)) {
                    $value = '';
                }
            }
        }
    } else {
        $atts = ltrim($text);
    }

    return $atts;
}

function shortcode_atts($pairs, $atts, $shortcode = '')
{
    $atts = (array) $atts;
    $out  = array();
    foreach ($pairs as $name => $default) {
        if (array_key_exists($name, $atts)) {
            $out[$name] = $atts[$name];
        } else {
            $out[$name] = $default;
        }
    }

    if ($shortcode) {
        /**
         * Filters shortcode attributes.
         *
         * If the third parameter of the shortcode_atts() function is present then this filter is available.
         * The third parameter, $shortcode, is the name of the shortcode.
         *
         * @since 3.6.0
         * @since 4.4.0 Added the `$shortcode` parameter.
         *
         * @param array  $out       The output array of shortcode attributes.
         * @param array  $pairs     The supported attributes and their defaults.
         * @param array  $atts      The user defined shortcode attributes.
         * @param string $shortcode The shortcode name.
         */
        $out = apply_filters("shortcode_atts_{$shortcode}", $out, $pairs, $atts, $shortcode);
    }

    return $out;
}

function strip_shortcodes($content)
{
    global $shortcode_tags;

    if (false === strpos($content, '[')) {
        return $content;
    }

    if (empty($shortcode_tags) || !is_array($shortcode_tags)) {
        return $content;
    }

    // Find all registered tag names in $content.
    preg_match_all('@\[([^<>&/\[\]\x00-\x20=]++)@', $content, $matches);

    $tags_to_remove = array_keys($shortcode_tags);

    /**
     * Filters the list of shortcode tags to remove from the content.
     *
     * @since 4.7.0
     *
     * @param array  $tags_to_remove Array of shortcode tags to remove.
     * @param string $content        Content shortcodes are being removed from.
     */
    $tags_to_remove = apply_filters('strip_shortcodes_tagnames', $tags_to_remove, $content);

    $tagnames = array_intersect($tags_to_remove, $matches[1]);

    if (empty($tagnames)) {
        return $content;
    }

    $content = do_shortcodes_in_html_tags($content, true, $tagnames);

    $pattern = get_shortcode_regex($tagnames);
    $content = preg_replace_callback("/$pattern/", 'strip_shortcode_tag', $content);

    // Always restore square braces so we don't break things like <!--[if IE ]>.
    $content = unescape_invalid_shortcodes($content);

    return $content;
}

function strip_shortcode_tag($m)
{
    // Allow [[foo]] syntax for escaping a tag.
    if ('[' === $m[1] && ']' === $m[6]) {
        return substr($m[0], 1, -1);
    }

    return $m[1] . $m[6];
}


function wp_html_split($input)
{
    return preg_split(get_html_split_regex(), $input, -1, PREG_SPLIT_DELIM_CAPTURE);
}

/**
 * Retrieves the regular expression for an HTML element.
 *
 * @since 4.4.0
 *
 * @return string The regular expression
 */
function get_html_split_regex()
{
    static $regex;

    if (!isset($regex)) {
        // phpcs:disable Squiz.Strings.ConcatenationSpacing.PaddingFound -- don't remove regex indentation
        $comments =
            '!'             // Start of comment, after the <.
            . '(?:'         // Unroll the loop: Consume everything until --> is found.
            .     '-(?!->)' // Dash not followed by end of comment.
            .     '[^\-]*+' // Consume non-dashes.
            . ')*+'         // Loop possessively.
            . '(?:-->)?';   // End of comment. If not found, match all input.

        $cdata =
            '!\[CDATA\['    // Start of comment, after the <.
            . '[^\]]*+'     // Consume non-].
            . '(?:'         // Unroll the loop: Consume everything until ]]> is found.
            .     '](?!]>)' // One ] not followed by end of comment.
            .     '[^\]]*+' // Consume non-].
            . ')*+'         // Loop possessively.
            . '(?:]]>)?';   // End of comment. If not found, match all input.

        $escaped =
            '(?='             // Is the element escaped?
            .    '!--'
            . '|'
            .    '!\[CDATA\['
            . ')'
            . '(?(?=!-)'      // If yes, which type?
            .     $comments
            . '|'
            .     $cdata
            . ')';

        $regex =
            '/('                // Capture the entire match.
            .     '<'           // Find start of element.
            .     '(?'          // Conditional expression follows.
            .         $escaped  // Find end of escaped element.
            .     '|'           // ...else...
            .         '[^>]*>?' // Find end of normal element.
            .     ')'
            . ')/';
        // phpcs:enable
    }

    return $regex;
}
