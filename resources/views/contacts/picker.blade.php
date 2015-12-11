<table class="table table-hover" ng-if="contacts.length">
	<thead>
		<tr>
			<th width="40"></th>			
			<th>Nome</th>
			<th>E-mail</th>
			<!-- <th>Client</th> -->
			<th>Telefones</th>
			<!-- <th>Price</th> -->			
		</tr>
	</thead>
	<tbody>	

		<tr ng-repeat="contact in contacts">
			<td class="text-center">
            	<input type="checkbox" name="contacts[]" value="@{{ contact.id }}">
            	<!-- <input type="hidden" name="contacts[]" id="inputContacts[]" class="form-control" ng-model="contact.id"> -->
			</td>			
			<td><strong>@{{	contact.name }}</strong></td>
			<td>@{{	contact.email }}</td>
			<td>@{{ contact.phones }}</td>
		</tr>					

	</tbody>
</table>