<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Page extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = ['page', 'partials.content-single-project'];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        global $post;

        return [
            'wrapped_title' => $this->get_title($post->post_title),
            'post' => $post,
            'toc' => $this->get_toc(apply_filters('the_content', $post->post_content)),
            'content' => $this->add_ids_and_jumpto_links('h2', apply_filters('the_content', $post->post_content)),

        ];
    }

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            // "title" => $this->title(),
        ];
    }

    public function get_title($title)
    {
        $parts = explode(' ', $title);
        $parts = array_map(function ($part) {
            return '<span>' . $part . '</span>';
        }, $parts);
        return implode(' ', $parts);
    }

    public function get_toc($content = '')
    {
        $toc   = '';
        $items   = $this->get_tags('h2', $content);

        if ($items) {
            $toc .= '<div class="relative">';
            $toc .= '<h3 class="font-bold border-b-2 border-blue pb-2 text-xl mb-6">Jump to</h3><ul id="toc-menu">';

            if (strpos($content, '<h2') >= 10) {
                $toc .=  '<li class="mb-4 text-xl leading-tight"><a href="#overview">Overview</a></li>';
            }
            foreach ($items as $item) {
                $toc .= '<li class="mb-4 text-xl  leading-tight" ><a href="#' . sanitize_title_with_dashes($item[2]) . '">' . $item[2] . '</a></li>';
            }
            $toc .= '</ul>';
            $toc .= '</div>';
        }

        return $toc;
    }

    private function add_ids_and_jumpto_links($tag, $content)
    {
        $items = $this->get_tags($tag, $content);

        $matches      = array();
        $replacements = array();

        foreach ($items as $item) {
            $replacement = '';
            $matches[]   = $item[0];
            $id          = sanitize_title_with_dashes($item[2]);
            $replacement   .= sprintf('<div class="group  relative"><%1$s class="flex justify-between gap-2" id="%2$s">%3$s<a href="#%2$s" class="before:absolute before:inset-0 group-hover:opacity-70 opacity-0 transition "><svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5" class="w-6 h-6 inline-block" viewBox="0 0 24 24">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244"/>
</svg></a></div></%1$s>', $tag, $id, $item[2]);
            $replacements[] = $replacement;
        }

        return str_replace($matches, $replacements, $content);
    }

    private function get_tags($tag, $content = '')
    {
        // if ( empty( $content ) ) {
        // 	$content = get_the_content();
        // }

        preg_match_all("/(<{$tag}.*>)(.*)(<\/{$tag}>)/", $content, $matches, PREG_SET_ORDER);
        return $matches;
    }
}
