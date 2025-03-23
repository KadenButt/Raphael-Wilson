<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link rel="icon" type="image/png" href="favicon_io/android-chrome-512x512.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<header id="navigation">

    <a href="{{route('home')}}">
        <img src="{{asset('favicon_io/android-chrome-512x512.png')}} " alt="Logo">
    </a>

    <div class="luxury-text">
        <h1><span style="font-weight:normal">Luxury footwear right at your fingertips</span></h1>
    </div>

    <div class="right-section">
        <div class="dropdown">

            <button class="menu-button">
                <div class="menu-icon"></div>
                <div class="menu-icon"></div>
                <div class="menu-icon"></div>
            </button>
            <div class="dropdown-menu">
                <a href="{{route('home')}}">Home</a>
                <a href="{{route('products')}}">Products</a>
                <a href="{{route('contact')}}">Contact</a>
                <a href="{{route('aboutUs')}}">About us</a>
                <a href="{{route('basket')}}">Basket</a>
                <a href="{{route('order')}}">Order History</a>
                <a href="{{route('customer.details')}}">Change Customer Details</a>
                <a href="{{ route('admin.home') }}">Admin Home</a>
                <a href="{{route('logout')}}">Logout</a>
            </div>
        </div>
    </div>
</header>

<body>

    <div class="customers-container">

        <div class="customers-header">
            <h1>Customers</h1>
        </div>

        <section id="form-error">
            @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </section>

        @foreach($customers as $customer)

        <div class="customer-box">
            <h3>Customer Name: {{$customer->customer_fname . ' ' . $customer->customer_sname}}</h3>
            <p>Account Type: @if($customer->admin) Admin @else Customer @endif</p>
            <a href="{{route('admin.orders', [$customer->customer_id])}}">Order History <span class="arrow">&rsaquo;</span></a>
            <div class="button-container">
                <form id='addToAdmin' method="POST" action="{{route('admin.add')}}">
                    @csrf
                    <button type='submit' class="icon-button"><i class="fas fa-plus"></i></button>
                    <input type="hidden" name="customer_id" value="{{$customer->customer_id}}" />
                </form>

                <form id="removeAdmin" method="POST" action="{{route('admin.remove')}}">
                    @csrf
                    <button type='submit' class="icon-button"><i class="fas fa-minus"></i></button>
                    <input type="hidden" name="customer_id" value="{{$customer->customer_id}}" />
                </form>
                <a href="{{ route('admin.edit', ['customer_id' => $customer->customer_id]) }}" class="icon-button">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{route('admin.delete.check', ['customer_id' => $customer->customer_id])}}">
                    <button type='submit' class="icon-button"><i class="fa-solid fa-trash"></i></button>
                    <input type="hidden" name="customer_id" value="{{$customer->customer_id}}" />
                </a>
            </div>
        </div>
        @endforeach

    </div>
</body>

<style>
    .customers-header {
        font-size: 30px;
        justify-items: center;
    }

    .customers-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }

    .arrow {
        font-size: 20px;
    }

    .customer-box {
        color: #ebf3f7;
        background-color: #104904;
        width: 50%;
        padding: 10px;
        padding-bottom: 30px;
        border-radius: 10px;
        margin: auto;
        position: relative;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.4);
    }

    .customer-box a {
        color: #ebf3f7;
        text-decoration: none;

    }

    .button-container {
        position: absolute;
        bottom: 10px;
        /* Position at the bottom */
        right: 10px;
        /* Position at the right */
        display: flex;
    }

    .icon-button {
        background-color: transparent;
        border: none;
        color: #ebf3f7;
        cursor: pointer;
        font-size: 20px;

    }

    .icon-button:hover {
        color: #d0e0e7;
    }


    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #ebf3f7;
        color: #104904;
    }

    .luxury-text {
        flex-grow: 1;
        text-align: center;
        font-family: Arial, sans-serif;
        white-space: nowrap;
        /*stops text going underneath when larger*/
        overflow: hidden;
        /*so it doesnt overflow the container*/
        color: #ebf3f7;
        margin: 0;
    }

    #navigation {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #104904;
        padding: 5px 20px;
        box-sizing: border-box;
        overflow: visible;
    }

    #navigation img {
        flex-shrink: 0;
        /*stops logo shrinking*/
        width: 70px;
        height: 70px;
    }

    .right-section {
        display: flex;
        align-items: center;
        gap: 15px;

    }

    .dropdown {
        position: relative;
    }

    .menu-button {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        cursor: pointer;
        background: none;
        border: none;
        height: 30px;
        gap: 6px;

    }

    .menu-icon {
        background-color: white;
        width: 35px;
        height: 6px;
        border-radius: 2px;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        right: 0;
        top: 100%;
        background-color: white;
        box-shadow: 0 4px 6px rgba(0.2, 0.2, 0.2, 0.2);
        border-radius: 5px;
        overflow: hidden;
        z-index: 1000;

    }

    .dropdown-menu a {
        display: block;
        padding: 10px 20px;
        color: #104904;
        text-decoration: none;
        font-weight: bold;

    }

    .dropdown-menu a:hover {
        background-color: #ebf3f7;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }
</style>