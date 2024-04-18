<h2>Generador de WW de la Tabla de productos</h2>

<ul>
    {{foreach tables}}
    <li>
        <form action="index.php?page=GeneratorBono_GeneratorBono" method="post">
            <input type="hidden" name="table" value="{{tables_in_nwdb}}">
            <input type="submit" value="Generar WW de la {{Tables_in_nwdb}}">
        </form>
    </li>
    {{endfor tables}}
</ul>

{{if columns}}
<h3>Columnas de la tabla {{table}}</h3>
<ul>
    {{foreach columns}}
    <li>{{Field}} {{Type}} {{Key}} {{Null}}</li>
    {{endif columns}}
</ul>
{{endif columns}}
<hr/>
<pre>
    {{genResult}}
</pre>