# Clean\Data\Collection  



## Implements:
Countable, Serializable, SeekableIterator, ArrayAccess, Traversable, Iterator

## Extend:

ArrayIterator

## Methods

| Name | Description |
|------|-------------|
|[__call](#collection__call)||
|[__get](#collection__get)|Returns direct value from entity when collection has only one element|
|[__isset](#collection__isset)|Returns isset on entity property when collection has only one element|
|[bindCollection](#collectionbindcollection)|Bind two collections|
|[chunk](#collectionchunk)|Splits collection into chunks|
|[clear](#collectionclear)|Remove all entities form collection|
|[distinctOn](#collectiondistincton)|Eliminates entities that contains the same value in given property|
|[extend](#collectionextend)|Extend collection with entities from another one|
|[filter](#collectionfilter)|Filter collection from entities not matching criteria given in callback|
|[first](#collectionfirst)|Returns first entity from collection|
|[getAllValuesForProperty](#collectiongetallvaluesforproperty)|Return values from all entities from given property|
|[getBy](#collectiongetby)|Get collection of entities matching criteria given in callback|
|[getKeys](#collectiongetkeys)|Returns collection keys|
|[getNewCollection](#collectiongetnewcollection)|Returns new instance of collection of the same type|
|[getNext](#collectiongetnext)|Returns next entity from collection|
|[getPrevious](#collectiongetprevious)|Returns previous entity from collection|
|[getRandom](#collectiongetrandom)|returns random entity from collection|
|[has](#collectionhas)|Checks if collection has entity with field equals to given value|
|[isEmpty](#collectionisempty)|Returns true if collection is empty|
|[isNotEmpty](#collectionisnotempty)|Returns true if collection is not empty|
|[last](#collectionlast)|Returns last entity from collection|
|[prepend](#collectionprepend)|Prepand entity to the begining of collection|
|[reindex](#collectionreindex)|Renumber collection keys (from zero to n), keeping values in the same place|
|[reverse](#collectionreverse)|Return an collection with elements in reverse order|
|[search](#collectionsearch)|Search for an element with given property and value|
|[shift](#collectionshift)|Shift an entity off the begining of collection|
|[slice](#collectionslice)|Extract a slice of the collection|
|[split](#collectionsplit)|Returns collection of collections created by spliting first Collection to a parts|
|[toArray](#collectiontoarray)|Tranform collection to array|
|[walk](#collectionwalk)|Apply a user supplied function to every member of an Collection|

## Inherited methods

| Name | Description |
|------|-------------|
| [__construct](https://secure.php.net/manual/en/arrayiterator.__construct.php) | Construct an ArrayIterator |
| [append](https://secure.php.net/manual/en/arrayiterator.append.php) | Append an element |
| [asort](https://secure.php.net/manual/en/arrayiterator.asort.php) | Sort array by values |
| [count](https://secure.php.net/manual/en/arrayiterator.count.php) | Count elements |
| [current](https://secure.php.net/manual/en/arrayiterator.current.php) | Return current array entry |
| [getArrayCopy](https://secure.php.net/manual/en/arrayiterator.getarraycopy.php) | Get array copy |
| [getFlags](https://secure.php.net/manual/en/arrayiterator.getflags.php) | Get flags |
| [key](https://secure.php.net/manual/en/arrayiterator.key.php) | Return current array key |
| [ksort](https://secure.php.net/manual/en/arrayiterator.ksort.php) | Sort array by keys |
| [natcasesort](https://secure.php.net/manual/en/arrayiterator.natcasesort.php) | Sort an array naturally, case insensitive |
| [natsort](https://secure.php.net/manual/en/arrayiterator.natsort.php) | Sort an array naturally |
| [next](https://secure.php.net/manual/en/arrayiterator.next.php) | Move to next entry |
| [offsetExists](https://secure.php.net/manual/en/arrayiterator.offsetexists.php) | Check if offset exists |
| [offsetGet](https://secure.php.net/manual/en/arrayiterator.offsetget.php) | Get value for an offset |
| [offsetSet](https://secure.php.net/manual/en/arrayiterator.offsetset.php) | Set value for an offset |
| [offsetUnset](https://secure.php.net/manual/en/arrayiterator.offsetunset.php) | Unset value for an offset |
| [rewind](https://secure.php.net/manual/en/arrayiterator.rewind.php) | Rewind array back to the start |
| [seek](https://secure.php.net/manual/en/arrayiterator.seek.php) | Seek to position |
| [serialize](https://secure.php.net/manual/en/arrayiterator.serialize.php) | Serialize |
| [setFlags](https://secure.php.net/manual/en/arrayiterator.setflags.php) | Set behaviour flags |
| [uasort](https://secure.php.net/manual/en/arrayiterator.uasort.php) | Sort with a user-defined comparison function and maintain index association |
| [uksort](https://secure.php.net/manual/en/arrayiterator.uksort.php) | Sort by keys using a user-defined comparison function |
| [unserialize](https://secure.php.net/manual/en/arrayiterator.unserialize.php) | Unserialize |
| [valid](https://secure.php.net/manual/en/arrayiterator.valid.php) | Check whether array contains more entries |



### Collection::__call  

**Description**

```php
 __call (void)
```

 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`void`


<hr />


### Collection::__get  

**Description**

```php
public __get (string $name)
```

Returns direct value from entity when collection has only one element 

 

**Parameters**

* `(string) $name`
: property name  

**Return Values**

`mixed`




**Throws Exceptions**


`\LogicException`
> when collection has more then one element

<hr />


### Collection::__isset  

**Description**

```php
public __isset (string $name)
```

Returns isset on entity property when collection has only one element 

 

**Parameters**

* `(string) $name`
: property name  

**Return Values**

`mixed`




**Throws Exceptions**


`\LogicException`
> when collection has more then one element

<hr />


### Collection::bindCollection  

**Description**

```php
public bindCollection (\Collection $collection, array $compareKeys, string $propertyName)
```

Bind two collections 

 

**Parameters**

* `(\Collection) $collection`
: collection  
* `(array) $compareKeys`
: The name of the key to compare with from target Collection  
* `(string) $propertyName`
: The nae of new property that will be created in source Collection  

**Return Values**

`static`




<hr />


### Collection::chunk  

**Description**

```php
public chunk (int $size)
```

Splits collection into chunks 

 

**Parameters**

* `(int) $size`

**Return Values**

`static`




<hr />


### Collection::clear  

**Description**

```php
public clear (void)
```

Remove all entities form collection 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`static`




<hr />


### Collection::distinctOn  

**Description**

```php
public distinctOn (string $propertyName)
```

Eliminates entities that contains the same value in given property 

 

**Parameters**

* `(string) $propertyName`
: Name of the property  

**Return Values**

`static`




<hr />


### Collection::extend  

**Description**

```php
public extend (\Collection $data)
```

Extend collection with entities from another one 

 

**Parameters**

* `(\Collection) $data`

**Return Values**

`static`




<hr />


### Collection::filter  

**Description**

```php
public filter (\Closure $callback)
```

Filter collection from entities not matching criteria given in callback 

 

**Parameters**

* `(\Closure) $callback`
: callback  

**Return Values**

`static`




<hr />


### Collection::first  

**Description**

```php
public first (void)
```

Returns first entity from collection 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Entity`




<hr />


### Collection::getAllValuesForProperty  

**Description**

```php
public getAllValuesForProperty (string $name)
```

Return values from all entities from given property 

 

**Parameters**

* `(string) $name`
: name  

**Return Values**

`array`




<hr />


### Collection::getBy  

**Description**

```php
public getBy (\Closure $callback)
```

Get collection of entities matching criteria given in callback 

Usage example:  
  
$colleciton->getBy(function($entity) {  
   return $entity->name == 'John';  
}); 

**Parameters**

* `(\Closure) $callback`

**Return Values**

`static`




<hr />


### Collection::getKeys  

**Description**

```php
public getKeys (void)
```

Returns collection keys 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`array`




<hr />


### Collection::getNewCollection  

**Description**

```php
public getNewCollection (void)
```

Returns new instance of collection of the same type 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`static`




<hr />


### Collection::getNext  

**Description**

```php
public getNext (void)
```

Returns next entity from collection 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Entity`




<hr />


### Collection::getPrevious  

**Description**

```php
public getPrevious (void)
```

Returns previous entity from collection 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Entity`




<hr />


### Collection::getRandom  

**Description**

```php
public getRandom (void)
```

returns random entity from collection 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Entity`




<hr />


### Collection::has  

**Description**

```php
public has (string $field, mixed $value)
```

Checks if collection has entity with field equals to given value 

 

**Parameters**

* `(string) $field`
: field  
* `(mixed) $value`
: value  

**Return Values**

`bool`




<hr />


### Collection::isEmpty  

**Description**

```php
public isEmpty (void)
```

Returns true if collection is empty 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`bool`




<hr />


### Collection::isNotEmpty  

**Description**

```php
public isNotEmpty (void)
```

Returns true if collection is not empty 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`bool`




<hr />


### Collection::last  

**Description**

```php
public last (void)
```

Returns last entity from collection 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Entity`




<hr />


### Collection::prepend  

**Description**

```php
public prepend (\Entity $entity)
```

Prepand entity to the begining of collection 

 

**Parameters**

* `(\Entity) $entity`

**Return Values**

`static`




<hr />


### Collection::reindex  

**Description**

```php
public reindex (void)
```

Renumber collection keys (from zero to n), keeping values in the same place 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`static`




<hr />


### Collection::reverse  

**Description**

```php
public reverse (void)
```

Return an collection with elements in reverse order 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`static`




<hr />


### Collection::search  

**Description**

```php
public search (string $field, mixed $value, bool $strict)
```

Search for an element with given property and value 

 

**Parameters**

* `(string) $field`
: name of property  
* `(mixed) $value`
: value to compare  
* `(bool) $strict`
: compare value and type of property  

**Return Values**

`int|string|bool`




<hr />


### Collection::shift  

**Description**

```php
public shift (void)
```

Shift an entity off the begining of collection 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Entity`




<hr />


### Collection::slice  

**Description**

```php
public slice (int $offset, int|null $length)
```

Extract a slice of the collection 

 

**Parameters**

* `(int) $offset`
* `(int|null) $length`

**Return Values**

`static`




<hr />


### Collection::split  

**Description**

```php
public split (int $parts)
```

Returns collection of collections created by spliting first Collection to a parts 

Example:  
  
When collection has 10 element and we would like to split to 3 separate collections:  
  
$splitted = $collection->split(3);  
$splitted->count(); // = 3  
$splitted[0]->count(); // = 4  
$splitted[1]->count(); // = 4  
$splitted[3]->count(); // = 2 

**Parameters**

* `(int) $parts`

**Return Values**

`static`




<hr />


### Collection::toArray  

**Description**

```php
public toArray (void)
```

Tranform collection to array 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`array`




<hr />


### Collection::walk  

**Description**

```php
public walk (\Closure $callback)
```

Apply a user supplied function to every member of an Collection 

 

**Parameters**

* `(\Closure) $callback`
: user supplied function  

**Return Values**

`static`




<hr />

