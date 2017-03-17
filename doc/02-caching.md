# Caching
The schema manager is informed of the schema definition by the cache manager. The cache manager is responsible for reading the schema annotations and parsing to a json schema cache file. The manager is also responsible for reading the cache file and parsing to a `CacheFile` object. The `CacheFile` returns information about the schema. Schema data can get gathered either by property name or bit number.

The schema data is returned in the `PropertyAnnotationContainer` container class. The `PropertyAnnotationContainer` can return information about the property such as its bit, length, setter name, etc.

A new cache file should be generated every time a change is made to a schema class. 
