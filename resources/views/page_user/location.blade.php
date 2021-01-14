@extends('templete.template')

@section('title', 'Base page')

@section('content')
{{-- แผนที่ --}}
<div class="card text-info bg-warning mb-3" style="max-width: 80rem;">
    <div class="card-header">คลินิกโรคผิวหนัง พญ.ปิยะรัตน์ Piyarat Skin Clinic</div>
    <div class="card-body">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3849.5957314316347!2d104.86250831484791!3d15.235274389400757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311687dc688f3b6f%3A0x319fb8570a54236d!2z4LiE4Lil4Li04LiZ4Li04LiB4LmC4Lij4LiE4Lic4Li04Lin4Lir4LiZ4Lix4LiHIOC4nuC4jS7guJvguLTguKLguLDguKPguLHguJXguJnguYwgUGl5YXJhdCBTa2luIENsaW5pYw!5e0!3m2!1sth!2sth!4v1610620746143!5m2!1sth!2sth" width="1000" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
  </div>
{{-- <iframe src="https://www.google.com/maps/d/embed?mid=1F3XiHsOKCUQ17J_MPLH4C7c-D8I" width="640" height="480"></iframe> --}}

@endsection