
@extends('layout.index')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Product Category</h1>

        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">

                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Category</h5>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <div class="dataTable-top" style="margin-top: 10px; margin-bottom: 10px">
                                    <a href="#" class="btn btn-success float-right">Add</a>
                                </div>
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">More</th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <th scope="row">5</th>
                                    <td>Raheem Lehner</td>
                                    <td>Dynamic Division Officer</td>
                                    <td>47</td>
                                    <td>2011-04-19</td>
                                    <td>
                                        <form action="#" method="post">
                                            <a href="#" class="btn btn-primary">Edit</a>
                                            @csrf
                                            @method('delete')
                                            <button type="submit"  class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
