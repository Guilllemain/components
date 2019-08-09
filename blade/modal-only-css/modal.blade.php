{{-- You need to include it in a blade file as a @component --}}
{{-- be sure to add the stylesheet and a link to open the modal --}}
{{-- with the same $name (ex: <a href="#modal">Open modal</a>) --}}

<div id="{{$name}}" class="overlay">

    <a href="#" class="modal__hide"></a>
    <div class="modal__content">
        {{$slot}}
        <a href="#" class="modal__close">&times;</a>
    </div>
</div>