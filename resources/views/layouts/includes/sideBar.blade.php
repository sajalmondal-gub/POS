<nav class="active" id="sidebar">
    <ul class="list-unstyled lead">
        <li class="active">
            <a href="#"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
            <a href="{{ route('orders.index') }}"><i class="fa fa-box fa-small" ></i> Order</a>
        </li>
        <li>
            <a href="{{ route('transactions.index') }}"><i class="fa fa-money-bill fa-small"></i> Transaction</a>
        </li>
        <li>
            <a href="{{ route('products.index') }}"><i class="fa fa-box fa-small "></i> Products</a>
        </li>
        

    </ul>

</nav>
<style>
    #sidebar ul.lead{
        border-bottom:1.5px solid black;
        width:fit-content;

    }
     #sidebar ul li a{
        padding:10px;
        font-size:1.1rem;
        width:30vh;
        display:block;
        color: black;
        text-decoration:none;
    }
    #sidebar ul li   a:hover {
    background-color: #dee1e3;
    }
    #sidebar ul li a i{
    margin-right:10px;
    }
    #sidebar ul li.active>a,a[aria-expanded="true"]{
    color:black;
    background:#dee1e3;
    }
</style>