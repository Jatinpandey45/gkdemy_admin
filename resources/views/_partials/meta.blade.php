@if (isset($post))
    <title>{{ $post->seo->keyword }}</title>
    <meta name="description" content="{{ $post->seo->description }}" />

    <meta property="og:type" content="Current Affairs" />
    <meta property="og:title" content="{{ $post->seo->keyword }}" />
    <meta property="og:url" content="www.gkdemy.com/current-affairs/{{$post->post_slug}}" />
    <meta property="og:image" content="http://admin.gkdemy.com/{{$post->featured_image}}" />
    <meta property="og:description" content="{{ $post->seo->description }}" />
    <meta property="og:site_name" content="GkDemy" />
    <meta property="article:published_time" content="{{ $post->publish_at }}" />
    <meta property="article:modified_time" content="{{ $post->updated_at }}" />
    @isset($post->tags)
        @foreach ($post->tags as $tag)
            <meta property="article:tag" key={{ $tag->id }} content="{{ $tag->tag_name }}" />
        @endforeach
    @endisset

    {{-- @isset($post->category && $post->category != null)
        @foreach ($post->category as $category)
            <meta property="article:section" key={{ $category->id }} content="{{ $category->category_name }}" />
        @endforeach
    @endisset --}}
    <meta name="twitter:card" content="Current Affairs" />
    <meta name="twitter:site" content="www.gkdemy.com/current-affairs/{{$post->post_slug}}" />
    <meta name="twitter:title" content="{{ $post->seo->keyword }}" />
    <meta name="twitter:description" content="{{ $post->seo->description }}" />
    <meta name="twitter:image" content="http://admin.gkdemy.com/{{$post->featured_image}}" />
@else
    <title>GKDemy</title>
@endif
