<table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Age</th>
                      <th>Gender</th>
                      <th>Class</th>
                      <th>Division</th>
                      <th class="text-right">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                    @if(count($results) > 0)
                    @foreach ($results as $data)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{ $data->name }}</td>
                      <td>{{ $data->age }}</td>
                      <td>{{ config('constant.Gender')[$data->gender] ?? '' }}</td>
                      <td>{{ $data->getClass->class_name ?? '' }}</td>
                      <td>{{ $data->getDivision->division_name ?? '' }}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                      <td colspan="6" class="text-center">No data found</td>
                    </tr>
                    @endif
                    
                    
                  </tbody>
                </table>
                <div class="d-flex justify-content-end first">{{ $results->render() }}</div>