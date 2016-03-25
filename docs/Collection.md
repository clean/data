# Clean\Data\Collection  



## Methods

| Name | Description |
|------|-------------|
|[__construct](#collection__construct)|Constructs Collection object|
|[getNewCollection](#collectiongetnewcollection)|Returns new instance of collection of the same type|
|[append](#collectionappend)|Append entities to collection|
|[prepend](#collectionprepend)|Prepand entity to the begining of collection|
|[__call](#collection__call)||
|[__get](#collection__get)|Returns direct value from entity when collection has only one element|
|[__isset](#collection__isset)|Returns isset on entity property when collection has only one element|
|[first](#collectionfirst)|Returns first entity from collection|
|[last](#collectionlast)|Returns last entity from collection|
|[getNext](#collectiongetnext)|Returns next entity from collection|
|[getPrevious](#collectiongetprevious)|Returns previous entity from collection|
|[getRandom](#collectiongetrandom)|returns random entity from collection|
|[isNotEmpty](#collectionisnotempty)|Returns true if collection is not empty|
|[isEmpty](#collectionisempty)|Returns true if collection is empty|
|[has](#collectionhas)|Checks if collection has entity with field equals to given value|
|[search](#collectionsearch)|Search for an element with given property and value|
|[shift](#collectionshift)|Shift an entity off the begining of collection|
|[filter](#collectionfilter)|Filter collection from entities not matching criteria given in callback|
|[getBy](#collectiongetby)|Get collection of entities matching criteria given in callback
and return new instance of object|
|[getKeys](#collectiongetkeys)|Returns collection keys|
|[chunk](#collectionchunk)|Splits collection into chunks|
|[slice](#collectionslice)|Extract a slice of the collection|
|[split](#collectionsplit)||
|[clear](#collectionclear)|Remove all entities form collection|
|[offsetUnset](#collectionoffsetunset)|Unset values from an offset or offsets|
|[toArray](#collectiontoarray)|Tranform collection to array|
|[reindex](#collectionreindex)|Renumber collection keys (from zero to n), keeping values in the same place|
|[distinctOn](#collectiondistincton)|Eliminates entities that contains the same value in given property|
|[reverse](#collectionreverse)|Return an collection with elements in reverse order|
|[walk](#collectionwalk)|Apply a user supplied function to every member of an Collection|
|[getAllValuesForProperty](#collectiongetallvaluesforproperty)|Return values from all entities from given property|
|[bindCollection](#collectionbindcollection)|Bind two collections|
|[offsetExists](#collectionoffsetexists)||
|[offsetGet](#collectionoffsetget)||
|[offsetSet](#collectionoffsetset)||
|[getArrayCopy](#collectiongetarraycopy)||
|[count](#collectioncount)||
|[getFlags](#collectiongetflags)||
|[setFlags](#collectionsetflags)||
|[asort](#collectionasort)||
|[ksort](#collectionksort)||
|[uasort](#collectionuasort)||
|[uksort](#collectionuksort)||
|[natsort](#collectionnatsort)||
|[natcasesort](#collectionnatcasesort)||
|[unserialize](#collectionunserialize)||
|[serialize](#collectionserialize)||
|[rewind](#collectionrewind)||
|[current](#collectioncurrent)||
|[key](#collectionkey)||
|[next](#collectionnext)||
|[valid](#collectionvalid)||
|[seek](#collectionseek)||


### Collection::__construct  

```php
public __construct (mixed $data)
```

**Description**

Constructs Collection object 

 

**Parameters**

`(mixed) $data`
: data  

**Return Values**




### Collection::getNewCollection  

```php
public getNewCollection (void)
```

**Description**

Returns new instance of collection of the same type 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Collection`





### Collection::append  

```php
public append (\Entity|\Collection|\Traversable|array $data)
```

**Description**

Append entities to collection 

 

**Parameters**

`(\Entity|\Collection|\Traversable|array) $data`
: entity or list of entities to append  

**Return Values**

`\Collection`





### Collection::prepend  

```php
public prepend (\Entity $entity)
```

**Description**

Prepand entity to the begining of collection 

 

**Parameters**

`(\Entity) $entity`

**Return Values**

`\Collection`





### Collection::__call  

```php
public __call (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::__get  

```php
public __get (string $name)
```

**Description**

Returns direct value from entity when collection has only one element 

 

**Parameters**

`(string) $name`
: property name  

**Return Values**

`mixed`





### Collection::__isset  

```php
public __isset (string $name)
```

**Description**

Returns isset on entity property when collection has only one element 

 

**Parameters**

`(string) $name`
: property name  

**Return Values**

`mixed`





### Collection::first  

```php
public first (void)
```

**Description**

Returns first entity from collection 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Entity`





### Collection::last  

```php
public last (void)
```

**Description**

Returns last entity from collection 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Entity`





### Collection::getNext  

```php
public getNext (void)
```

**Description**

Returns next entity from collection 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Entity`





### Collection::getPrevious  

```php
public getPrevious (void)
```

**Description**

Returns previous entity from collection 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Entity`





### Collection::getRandom  

```php
public getRandom (void)
```

**Description**

returns random entity from collection 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Entity`





### Collection::isNotEmpty  

```php
public isNotEmpty (void)
```

**Description**

Returns true if collection is not empty 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`bool`





### Collection::isEmpty  

```php
public isEmpty (void)
```

**Description**

Returns true if collection is empty 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`bool`





### Collection::has  

```php
public has (string $field, mixed $value)
```

**Description**

Checks if collection has entity with field equals to given value 

 

**Parameters**

`(string) $field`
: field  
`(mixed) $value`
: value  

**Return Values**

`bool`





### Collection::search  

```php
public search (string $field, mixed $value, bool $strict)
```

**Description**

Search for an element with given property and value 

 

**Parameters**

`(string) $field`
: name of property  
`(mixed) $value`
: value to compare  
`(bool) $strict`
: compare value and type of property  

**Return Values**

`integer|string|false`





### Collection::shift  

```php
public shift (void)
```

**Description**

Shift an entity off the begining of collection 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Entity`





### Collection::filter  

```php
public filter (\Closure $callback)
```

**Description**

Filter collection from entities not matching criteria given in callback 

 

**Parameters**

`(\Closure) $callback`
: callback  

**Return Values**

`\Collection`





### Collection::getBy  

```php
public getBy (\Closure $callback)
```

**Description**

Get collection of entities matching criteria given in callback
and return new instance of object 

 

**Parameters**

`(\Closure) $callback`

**Return Values**

`\Collection`





### Collection::getKeys  

```php
public getKeys (void)
```

**Description**

Returns collection keys 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`array`





### Collection::chunk  

```php
public chunk (integer $size)
```

**Description**

Splits collection into chunks 

 

**Parameters**

`(integer) $size`

**Return Values**

`\Collection`





### Collection::slice  

```php
public slice (integer $offset, integer|null $length)
```

**Description**

Extract a slice of the collection 

 

**Parameters**

`(integer) $offset`
`(integer|null) $length`

**Return Values**

`\Collection`





### Collection::split  

```php
public split (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::clear  

```php
public clear (void)
```

**Description**

Remove all entities form collection 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Collection`





### Collection::offsetUnset  

```php
public offsetUnset (string|array $index)
```

**Description**

Unset values from an offset or offsets 

 

**Parameters**

`(string|array) $index`
: Offsets to remove  

**Return Values**

`\Collection`





### Collection::toArray  

```php
public toArray (void)
```

**Description**

Tranform collection to array 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`array`





### Collection::reindex  

```php
public reindex (void)
```

**Description**

Renumber collection keys (from zero to n), keeping values in the same place 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Collection`





### Collection::distinctOn  

```php
public distinctOn (string $propertyName)
```

**Description**

Eliminates entities that contains the same value in given property 

 

**Parameters**

`(string) $propertyName`
: Name of the property  

**Return Values**

`\Collection`





### Collection::reverse  

```php
public reverse (void)
```

**Description**

Return an collection with elements in reverse order 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Collection`





### Collection::walk  

```php
public walk (\Closure $callback)
```

**Description**

Apply a user supplied function to every member of an Collection 

 

**Parameters**

`(\Closure) $callback`
: user supplied function  

**Return Values**

`\Collection`





### Collection::getAllValuesForProperty  

```php
public getAllValuesForProperty (string $name)
```

**Description**

Return values from all entities from given property 

 

**Parameters**

`(string) $name`
: name  

**Return Values**

`array`





### Collection::bindCollection  

```php
public bindCollection (\Collection $collection, array $compareKeys, string $propertyName)
```

**Description**

Bind two collections 

 

**Parameters**

`(\Collection) $collection`
: collection  
`(array) $compareKeys`
: The name of the key to compare with from target Collection  
`(string) $propertyName`
: The nae of new property that will be created in source Collection  

**Return Values**

`\Collection`





### Collection::offsetExists  

```php
public offsetExists (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::offsetGet  

```php
public offsetGet (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::offsetSet  

```php
public offsetSet (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::getArrayCopy  

```php
public getArrayCopy (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::count  

```php
public count (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::getFlags  

```php
public getFlags (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::setFlags  

```php
public setFlags (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::asort  

```php
public asort (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::ksort  

```php
public ksort (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::uasort  

```php
public uasort (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::uksort  

```php
public uksort (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::natsort  

```php
public natsort (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::natcasesort  

```php
public natcasesort (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::unserialize  

```php
public unserialize (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::serialize  

```php
public serialize (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::rewind  

```php
public rewind (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::current  

```php
public current (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::key  

```php
public key (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::next  

```php
public next (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::valid  

```php
public valid (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::seek  

```php
public seek (void)
```

**Description**

 

 

**Parameters**

`This function has no parameters.`

**Return Values**



