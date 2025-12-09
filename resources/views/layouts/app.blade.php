@props(['title' => '','bodyClass' => null, 'footerLinks' =>''])
<x-base-layout :$title :$bodyClass>
    <x-layouts.header />
    {{ $slot }}
    <footer>
        <a href="#">Links 1</a>
        <a href="#">Links 2</a>
        {{ $footerLinks }}
    </footer>
</x-base-layout>



