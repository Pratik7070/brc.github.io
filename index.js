<html>
<body>
<script>

const a = [

[1,2,3],
[4,[5,6]],
[[7], [8,[9]]],
10
];

fuction flatten(arr){
let flatten =[];
for (let i=0;i<arr.length;i++){
	if(Array.isArray(arr(i))){
		flattened = flattened.concat(flatten(arr[i]));

}else{
flattened.push(arr[i]);


}

}
return flattened;


}

console.log(
	flatten(data)
	)


</script>
</body>
</html>