@extends('base')

@section('content')
<h1>Add Testimonial</h1>
    <form id="testimonialform" name="testimonialform" class="form-horizontal" action="/add-testimonial" method="post" novalidate>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
            </div>
        </div>
            <div class="form-group">
                <label for="testimonial" class="col-sm-2 control-label">Testimonial</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="testimonial" name="testimonial" placeholder="Testimonial"></textarea>
                </div>
            </div>

        <hr>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Save Testimonial</button>
        </div>
      </div>
    </form>
@stop

@section('bottomjs')
<script>
    $(document).ready(function(){
        $("#testimonialform").validate({
            rules: {
                title: {
                    required: true
                },
                testimonial: {
                    required: true
                }
            }
        });
    });
</script>
@stop
