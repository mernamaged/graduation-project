<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>6Ms Feedback</title>
    <link rel="icon" type="x-icon" href="assets/img/shirt-solid.svg">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('assets/css/feedback.css')}}">

</head>

<body>
    
    <div id="contact">
     
        <div id="contactForm">
          @foreach ($orders as $order)
            <form id="contactForm" method="post" action="{{route('feedbacks.store')}}">
                <h1 style="margin-bottom: 10px; text-transform: lowercase;">Feedback</h1>
                @csrf
                <input placeholder="rating your experience" type="number" max="10" min="1" name="rate" required />
                <input type="hidden" name="order_id" value="{{$order->order_id}}">

                <textarea id="message" placeholder="Your comment" name="comment" style="resize: none;" required></textarea>
                <button class="formBtn" type="submit">Submit</button>
            </form>

        </div>
    </div>


    @endforeach


    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/all.min.js') }}"></script>
</body>

</html>
