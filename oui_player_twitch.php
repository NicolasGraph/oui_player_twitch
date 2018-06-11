<?php

/*
 * This file is part of oui_player,
 * an extendable plugin to easily embed
 * customizable players in Textpattern CMS.
 *
 * https://github.com/NicolasGraph/oui_player
 *
 * Copyright (C) 2016-2017 Nicolas Morand
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
 * DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT
 * OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE
 * OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

/**
 * Twitch
 *
 * @package Oui\Player
 */

namespace Oui\Player {

    if (class_exists('Oui\Player\Provider')) {

        class Twitch extends Provider
        {
            protected static $patterns = array(
                'video' => array(
                    'scheme' => '#^((http|https)://(www\.)?twitch\.tv/videos/([0-9]+))$#i',
                    'id'     => '4',
                    'prefix' => 'video=v',
                ),
                'channel' => array(
                    'scheme' => '#^((http|https):\/\/(www.)?twitch\.tv\/([^\&\?\/]+))$#i',
                    'id'     => '4',
                    'prefix' => 'channel=',
                ),
            );
            protected static $src = '//player.twitch.tv/';
            protected static $glue = array('?', '&amp;', '&amp;');
            protected static $params = array(
                'autoplay' => array(
                    'default' => 'true',
                    'valid'   => array('true', 'false'),
                ),
                'muted'    => array(
                    'default' => 'false',
                    'valid'   => array('true', 'false'),
                ),
                'time'     => array(
                    'default' => '',
                    'valid'   => 'number',
                ),
            );
        }

        register_callback('Oui\Player\Twitch::getProvider', 'oui_player', 'plug_providers');
    }
}
