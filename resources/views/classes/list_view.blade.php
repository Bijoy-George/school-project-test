<table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Class Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                    @if(count($results) > 0)
                    @foreach ($results as $data)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{ $data->class_name }}</td>
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