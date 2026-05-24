<?php

// Archivo de traduccion al espanol para mensajes de validacion de formularios
return [

    // Mensaje cuando el campo debe ser aceptado
    'accepted'        => 'El campo :attribute debe ser aceptado.',

    // Mensaje cuando la URL del campo no es valida
    'active_url'      => 'El campo :attribute no es una URL valida.',

    // Mensaje cuando la fecha debe ser posterior a otra fecha
    'after'           => 'El campo :attribute debe ser una fecha posterior a :date.',

    // Mensaje cuando la fecha debe ser posterior o igual a otra fecha
    'after_or_equal'  => 'El campo :attribute debe ser una fecha posterior o igual a :date.',

    // Mensaje cuando el campo solo puede contener letras
    'alpha'           => 'El campo :attribute solo puede contener letras.',

    // Mensaje cuando el campo solo puede contener letras, numeros, guiones y guiones bajos
    'alpha_dash'      => 'El campo :attribute solo puede contener letras, numeros, guiones y guiones bajos.',

    // Mensaje cuando el campo solo puede contener letras y numeros
    'alpha_num'       => 'El campo :attribute solo puede contener letras y numeros.',

    // Mensaje cuando el campo debe ser un arreglo
    'array'           => 'El campo :attribute debe ser un array.',

    // Mensaje cuando la fecha debe ser anterior a otra fecha
    'before'          => 'El campo :attribute debe ser una fecha anterior a :date.',

    // Mensaje cuando la fecha debe ser anterior o igual a otra fecha
    'before_or_equal' => 'El campo :attribute debe ser una fecha anterior o igual a :date.',

    // Mensajes cuando el valor debe estar entre un minimo y un maximo
    'between' => [
        'numeric' => 'El campo :attribute debe ser un valor entre :min y :max.',
        'file'    => 'El archivo :attribute debe pesar entre :min y :max kilobytes.',
        'string'  => 'El campo :attribute debe contener entre :min y :max caracteres.',
        'array'   => 'El campo :attribute debe contener entre :min y :max elementos.',
    ],

    // Mensaje cuando el campo debe ser verdadero o falso
    'boolean'         => 'El campo :attribute debe ser verdadero o falso.',

    // Mensaje cuando el campo de confirmacion no coincide
    'confirmed'       => 'El campo confirmacion de :attribute no coincide.',

    // Mensaje cuando el campo no es una fecha valida
    'date'            => 'El campo :attribute no corresponde con una fecha valida.',

    // Mensaje cuando la fecha debe ser igual a otra fecha
    'date_equals'     => 'El campo :attribute debe ser una fecha igual a :date.',

    // Mensaje cuando el formato de fecha no es correcto
    'date_format'     => 'El campo :attribute no corresponde con el formato de fecha :format.',

    // Mensaje cuando dos campos deben ser diferentes
    'different'       => 'Los campos :attribute y :other deben ser diferentes.',

    // Mensaje cuando el campo debe tener un numero exacto de digitos
    'digits'          => 'El campo :attribute debe ser un numero de :digits digitos.',

    // Mensaje cuando el campo debe tener entre cierto numero de digitos
    'digits_between'  => 'El campo :attribute debe contener entre :min y :max digitos.',

    // Mensaje cuando las dimensiones de la imagen son invalidas
    'dimensions'      => 'El campo :attribute tiene dimensiones de imagen invalidas.',

    // Mensaje cuando el campo tiene un valor duplicado
    'distinct'        => 'El campo :attribute tiene un valor duplicado.',

    // Mensaje cuando el campo debe ser un correo electronico valido
    'email'           => 'El campo :attribute debe ser una direccion de correo valida.',

    // Mensaje cuando el campo debe terminar con ciertos valores
    'ends_with'       => 'El campo :attribute debe finalizar con alguno de los siguientes valores: :values.',

    // Mensaje cuando el valor seleccionado no existe
    'exists'          => 'El campo :attribute seleccionado no existe.',

    // Mensaje cuando el campo debe ser un archivo
    'file'            => 'El campo :attribute debe ser un archivo.',

    // Mensaje cuando el campo debe tener un valor
    'filled'          => 'El campo :attribute debe tener un valor.',

    // Mensajes cuando el valor debe ser mayor a otro valor
    'gt' => [
        'numeric' => 'El campo :attribute debe ser mayor a :value.',
        'file'    => 'El archivo :attribute debe pesar mas de :value kilobytes.',
        'string'  => 'El campo :attribute debe contener mas de :value caracteres.',
        'array'   => 'El campo :attribute debe contener mas de :value elementos.',
    ],

    // Mensajes cuando el valor debe ser mayor o igual a otro valor
    'gte' => [
        'numeric' => 'El campo :attribute debe ser mayor o igual a :value.',
        'file'    => 'El archivo :attribute debe pesar :value o mas kilobytes.',
        'string'  => 'El campo :attribute debe contener :value o mas caracteres.',
        'array'   => 'El campo :attribute debe contener :value o mas elementos.',
    ],

    // Mensaje cuando el campo debe ser una imagen
    'image'           => 'El campo :attribute debe ser una imagen.',

    // Mensaje cuando el campo es invalido
    'in'              => 'El campo :attribute es invalido.',

    // Mensaje cuando el campo no existe en otro campo
    'in_array'        => 'El campo :attribute no existe en :other.',

    // Mensaje cuando el campo debe ser un numero entero
    'integer'         => 'El campo :attribute debe ser un numero entero.',

    // Mensaje cuando el campo debe ser una direccion IP valida
    'ip'              => 'El campo :attribute debe ser una direccion IP valida.',

    // Mensaje cuando el campo debe ser una direccion IPv4 valida
    'ipv4'            => 'El campo :attribute debe ser una direccion IPv4 valida.',

    // Mensaje cuando el campo debe ser una direccion IPv6 valida
    'ipv6'            => 'El campo :attribute debe ser una direccion IPv6 valida.',

    // Mensaje cuando el campo debe ser una cadena JSON valida
    'json'            => 'El campo :attribute debe ser una cadena de texto JSON valida.',

    // Mensajes cuando el valor debe ser menor a otro valor
    'lt' => [
        'numeric' => 'El campo :attribute debe ser menor a :value.',
        'file'    => 'El archivo :attribute debe pesar menos de :value kilobytes.',
        'string'  => 'El campo :attribute debe contener menos de :value caracteres.',
        'array'   => 'El campo :attribute debe contener menos de :value elementos.',
    ],

    // Mensajes cuando el valor debe ser menor o igual a otro valor
    'lte' => [
        'numeric' => 'El campo :attribute debe ser menor o igual a :value.',
        'file'    => 'El archivo :attribute debe pesar :value o menos kilobytes.',
        'string'  => 'El campo :attribute debe contener :value o menos caracteres.',
        'array'   => 'El campo :attribute debe contener :value o menos elementos.',
    ],

    // Mensajes cuando el valor no debe superar un maximo
    'max' => [
        'numeric' => 'El campo :attribute no debe ser mayor a :max.',
        'file'    => 'El archivo :attribute no debe pesar mas de :max kilobytes.',
        'string'  => 'El campo :attribute no debe contener mas de :max caracteres.',
        'array'   => 'El campo :attribute no debe contener mas de :max elementos.',
    ],

    // Mensaje cuando el campo debe ser de cierto tipo de archivo
    'mimes'           => 'El campo :attribute debe ser un archivo de tipo: :values.',

    // Mensaje cuando el campo debe ser de cierto tipo MIME
    'mimetypes'       => 'El campo :attribute debe ser un archivo de tipo: :values.',

    // Mensajes cuando el valor debe ser al menos un minimo
    'min' => [
        'numeric' => 'El campo :attribute debe ser al menos :min.',
        'file'    => 'El archivo :attribute debe pesar al menos :min kilobytes.',
        'string'  => 'El campo :attribute debe contener al menos :min caracteres.',
        'array'   => 'El campo :attribute debe contener al menos :min elementos.',
    ],

    // Mensaje cuando el valor seleccionado es invalido
    'not_in'          => 'El campo :attribute seleccionado es invalido.',

    // Mensaje cuando el formato del campo es invalido
    'not_regex'       => 'El formato del campo :attribute es invalido.',

    // Mensaje cuando el campo debe ser un numero
    'numeric'         => 'El campo :attribute debe ser un numero.',

    // Mensaje cuando la contrasena es incorrecta
    'password'        => 'La contrasena es incorrecta.',

    // Mensaje cuando el campo debe estar presente
    'present'         => 'El campo :attribute debe estar presente.',

    // Mensaje cuando el formato del campo es invalido
    'regex'           => 'El formato del campo :attribute es invalido.',

    // Mensaje cuando el campo es obligatorio
    'required'        => 'El campo :attribute es obligatorio.',

    // Mensaje cuando el campo es obligatorio segun otro campo
    'required_if'     => 'El campo :attribute es obligatorio cuando el campo :other es :value.',

    // Mensaje cuando el campo es requerido a menos que otro campo tenga cierto valor
    'required_unless' => 'El campo :attribute es requerido a menos que :other se encuentre en :values.',

    // Mensaje cuando el campo es obligatorio cuando otro campo esta presente
    'required_with'     => 'El campo :attribute es obligatorio cuando :values esta presente.',

    // Mensaje cuando el campo es obligatorio cuando varios campos estan presentes
    'required_with_all' => 'El campo :attribute es obligatorio cuando :values estan presentes.',

    // Mensaje cuando el campo es obligatorio cuando otro campo no esta presente
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no esta presente.',

    // Mensaje cuando el campo es obligatorio cuando ninguno de varios campos esta presente
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de los campos :values estan presentes.',

    // Mensaje cuando dos campos deben coincidir
    'same'            => 'Los campos :attribute y :other deben coincidir.',

    // Mensajes cuando el campo debe tener un tamano exacto
    'size' => [
        'numeric' => 'El campo :attribute debe ser :size.',
        'file'    => 'El archivo :attribute debe pesar :size kilobytes.',
        'string'  => 'El campo :attribute debe contener :size caracteres.',
        'array'   => 'El campo :attribute debe contener :size elementos.',
    ],

    // Mensaje cuando el campo debe comenzar con ciertos valores
    'starts_with'     => 'El campo :attribute debe comenzar con uno de los siguientes valores: :values.',

    // Mensaje cuando el campo debe ser una cadena de caracteres
    'string'          => 'El campo :attribute debe ser una cadena de caracteres.',

    // Mensaje cuando el campo debe ser una zona horaria valida
    'timezone'        => 'El campo :attribute debe ser una zona horaria valida.',

    // Mensaje cuando el valor del campo ya esta en uso
    'unique'          => 'El valor del campo :attribute ya esta en uso.',

    // Mensaje cuando el archivo no se pudo subir
    'uploaded'        => 'El campo :attribute no se pudo subir.',

    // Mensaje cuando el formato de la URL es invalido
    'url'             => 'El formato del campo :attribute es invalido.',

    // Mensaje cuando el campo debe ser un UUID valido
    'uuid'            => 'El campo :attribute debe ser un UUID valido.',

    // Seccion para mensajes de validacion personalizados por campo
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    // Seccion para renombrar los atributos en los mensajes de error
    'attributes' => [],

];
