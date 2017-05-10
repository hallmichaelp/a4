<div class="four columns hint">
   <p id="hint_{{ $group }}"><span class="emphasis hint_{{ $group }}">{{ $hints[$group][0] }}</span> is not the right answer.</p>
</div>

  <input name="button_{{ $group }}" class="button button-hint" type="button" value="Hint">

@if ({{ $value[1] }} === {{ $useranswers[$question + 1] }}) @else glyphicon-remove @endif
