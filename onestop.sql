-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2022 at 04:15 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onestop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `picture` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `fullName`, `picture`) VALUES
(1, 'okewale', '12345', 'Olalekan Okewale', '');

-- --------------------------------------------------------

--
-- Table structure for table `busline`
--

CREATE TABLE `busline` (
  `id` varchar(4) DEFAULT NULL,
  `name` varchar(88) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `busline`
--

INSERT INTO `busline` (`id`, `name`) VALUES
('111', 'Wheat'),
('112', 'Rice'),
('115', 'Corn'),
('116', 'Soybeans'),
('119', 'Cash Grains, Not Elsewhere Classified'),
('131', 'Cotton'),
('132', 'Tobacco'),
('133', 'Sugarcane and Sugar Beets'),
('134', 'Irish Potatoes'),
('139', 'Field Crops, except Cash Grains, Not Elsewhere Classified'),
('161', 'Vegetables and Melons'),
('171', 'Berry Crops'),
('172', 'Grapes'),
('173', 'Tree Nuts'),
('174', 'Citrus Fruits'),
('175', 'Deciduous Tree Fruits'),
('179', 'Fruits and Tree Nuts, Not Elsewhere Classified'),
('181', 'Ornamental Floriculture and Nursery Products'),
('182', 'Food Crops Grown Under Cover'),
('191', 'General Farms, Primarily Crop'),
('211', 'Beef Cattle Feedlots'),
('212', 'Beef Cattle, except Feedlots'),
('213', 'Hogs'),
('214', 'Sheep and Goats'),
('219', 'General Livestock, except Dairy and Poultry'),
('241', 'Dairy Farms'),
('251', 'Broiler, Fryer and Roaster Chickens'),
('252', 'Chicken Eggs'),
('253', 'Turkeys and Turkey Eggs'),
('254', 'Poultry Hatcheries'),
('259', 'Poultry and Eggs, Not Elsewhere Classified'),
('271', 'Fur-Bearing Animals and Rabbits'),
('272', 'Horses and other Equines'),
('273', 'Animal Aquaculture'),
('279', 'Animal Specialties, Not Elsewhere Classified'),
('291', 'General Farms, Primarily Livestock and Animal Specialties'),
('711', 'Soil Preparation Services'),
('721', 'Crop Planting, Cultivating, and Protecting'),
('722', 'Crop Harvesting, Primarily by Machine'),
('723', 'Crop Preparation Services for Market, except Cotton Ginning'),
('724', 'Cotton Ginning'),
('741', 'Veterinary Services for Livestock'),
('742', 'Veterinary Services for Animal Specialties'),
('751', 'Livestock Services, except Veterinary'),
('752', 'Animal Specialty Services, except Veterinary'),
('761', 'Farm Labor Contractors and Crew Leaders'),
('762', 'Farm Management Services'),
('781', 'Landscape Counselling and Planning'),
('782', 'Lawn and Garden Services'),
('783', 'Ornamental Shrub and Tree Services'),
('811', 'Timber Tracts'),
('831', 'Forest Nurseries and Gathering of Forest Products'),
('851', 'Forestry Services'),
('912', 'Finfish'),
('913', 'Shellfish'),
('919', 'Miscellaneous Marine Products'),
('921', 'Fish Hatcheries and Preserves'),
('971', 'Hunting and Trapping, and Game Propagation'),
('1011', 'Iron Ores'),
('1021', 'Copper Ores'),
('1031', 'Lead and Zinc Ores'),
('1041', 'Gold Ores'),
('1044', 'Silver Ores'),
('1061', 'Ferroalloy Ores, except Vanadium'),
('1081', 'Metal Mining Services'),
('1094', 'Uranium-Radium-Vanadium Ores'),
('1099', 'Miscellaneous Metal Ores, Not Elsewhere Classified'),
('1221', 'Bituminous Coal and Lignite Surface Mining'),
('1222', 'Bituminous Coal Underground Mining'),
('1231', 'Anthracite Mining'),
('1241', 'Coal Mining Services'),
('1311', 'Crude Petroleum and Natural Gas'),
('1321', 'Natural Gas Liquids'),
('1381', 'Drilling Oil and Gas Wells'),
('1382', 'Oil and Gas Field Exploration Services'),
('1389', 'Oil and Gas Field Services, Not Elsewhere Classified'),
('1411', 'Dimension Stone'),
('1422', 'Crushed and Broken Limestone'),
('1423', 'Crushed and Broken Granite'),
('1429', 'Crushed and Broken Stone, Not Elsewhere Classified'),
('1442', 'Construction Sand and Gravel'),
('1446', 'Industrial Sand'),
('1455', 'Kaolin and Ball Clay'),
('1459', 'Clay, Ceramic and Refractory Minerals, Not Elsewhere Classified'),
('1474', 'Potash, Soda and Borate Minerals'),
('1475', 'Phosphate Rock'),
('1479', 'Chemical and Fertiliser Mineral Mining, Not Elsewhere Classified'),
('1481', 'Nonmetallic Minerals Services, except Fuels'),
('1499', 'Miscellaneous Nonmetallic Minerals, except Fuels'),
('1521', 'General Contractors - Single-Family Houses'),
('1522', 'General Contractors - Residential Buildings, other than Single-Family'),
('1531', 'Operative Builders'),
('1541', 'General Contractors - Industrial Buildings and Warehouses'),
('1542', 'General Contractors-Nonresidential Bldgs,other than Industrial Buildings & Warehouses'),
('1611', 'Highway and Street Construction, except Elevated Highways'),
('1622', 'Bridge, Tunnel and Elevated Highway Construction'),
('1623', 'Water, Sewer, Pipeline and Communications and Power Line Construction'),
('1629', 'Heavy Construction, Not Elsewhere Classified'),
('1711', 'Plumbing, Heating and Air Conditioning'),
('1721', 'Painting and Paper Hanging'),
('1731', 'Electrical Work'),
('1741', 'Masonry, Stone Setting and other Stone Work'),
('1742', 'Plastering, Drywall, Acoustical and Insulation Work'),
('1743', 'Terrazzo, Tile, Marble and Mosaic Work'),
('1751', 'Carpentry Work'),
('1752', 'Floor Laying and other Floor Work, Not Elsewhere Classified'),
('1761', 'Roofing, Siding and Sheet Metal Work'),
('1771', 'Concrete Work'),
('1781', 'Water Well Drilling'),
('1791', 'Structural Steel Erection'),
('1793', 'Glass and Glazing Work'),
('1794', 'Excavation Work'),
('1795', 'Wrecking and Demolition Work'),
('1796', 'Installation or Erection of Building Equipment, Not Elsewhere Classified'),
('1799', 'Special Trade Contractors, Not Elsewhere Classified'),
('2011', 'Meat Packing Plants'),
('2013', 'Sausages and other Prepared Meat Products'),
('2015', 'Poultry Slaughtering and Processing'),
('2021', 'Creamery Butter'),
('2022', 'Natural, Processed and Imitation Cheese'),
('2023', 'Dry, Condensed and Evaporated Dairy Products'),
('2024', 'Ice Cream and Frozen Desserts'),
('2026', 'Fluid Milk'),
('2032', 'Canned Specialties'),
('2033', 'Canned Fruits, Vegetables, Preserves, Jams and Jellies'),
('2034', 'Dried and Dehydrated Fruits, Vegetables and Soup Mixes'),
('2035', 'Pickled Fruits and Vegetable Sauces and Seasonings and Salad Dressings'),
('2037', 'Frozen Fruits, Fruit Juices and Vegetables'),
('2038', 'Frozen Specialties, Not Elsewhere Classified'),
('2041', 'Flour and other Grain Mill Products'),
('2043', 'Cereal Breakfast Foods'),
('2044', 'Rice Milling'),
('2045', 'Prepared Flour Mixes and Doughs'),
('2046', 'Wet Corn Milling'),
('2047', 'Dog and Cat Food'),
('2048', 'Prepared Feeds and Feed Ingredients for Animals and Fowls, except Dogs and Cats'),
('2051', 'Bread and other Bakery Products, except Biscuits and Crackers'),
('2052', 'Cookies and Crackers'),
('2053', 'Frozen Bakery Products, except Bread'),
('2061', 'Cane Sugar, except Refining'),
('2062', 'Cane Sugar Refining'),
('2063', 'Beet Sugar'),
('2064', 'Candy and other Confectionery Products'),
('2066', 'Chocolate and Cocoa Products'),
('2067', 'Chewing Gum'),
('2068', 'Salted and Roasted Nuts and Seeds'),
('2074', 'Cottonseed Oil Mills'),
('2075', 'Soybean Oil Mills'),
('2076', 'Vegetable Oil Mills, except Corn, Cottonseed and Soybean'),
('2077', 'Animal and Marine Fats and Oils'),
('2079', 'Shortening,Table Oils,Margarine and other Edible Fats and Oils, Not Elsewhere Classified'),
('2082', 'Malt Beverages'),
('2083', 'Malt'),
('2084', 'Wines, Brandy and Brandy Spirits'),
('2085', 'Distilled and Blended Liquors'),
('2086', 'Bottled and Canned Soft Drinks and Carbonated Waters'),
('2087', 'Flavouring Extracts and Flavouring Syrups, Not Elsewhere Classified'),
('2091', 'Canned and Cured Fish and Seafoods'),
('2092', 'Prepared Fresh or Frozen Fish and Seafoods'),
('2095', 'Roasted Coffee'),
('2096', 'Potato Chips, Corn Chips and Similar Snacks'),
('2097', 'Manufactured Ice'),
('2098', 'Macaroni, Spaghetti, Vermicelli and Noodles'),
('2099', 'Food Preparations, Not Elsewhere Classified'),
('21', 'TOBACCO PRODUCTS (MANUFACTURING)'),
('2111', 'Cigarettes'),
('2121', 'Cigars'),
('2131', 'Chewing and Smoking Tobacco and Snuff'),
('2141', 'Tobacco Stemming and Redrying'),
('2211', 'Broadwoven Fabric Mills, Cotton'),
('2221', 'Broadwoven Fabric Mills, Manmade Fibre and Silk'),
('2231', 'Broadwoven Fabric Mills, Wool (Including Dyeing and Finishing)'),
('2241', 'Narrow Fabric and other Smallwares Mills: Cotton, Wool, Silk and Manmade Fibre'),
('2251', 'Womens Full-Length and Knee-Length Hosiery, except Socks'),
('2252', 'Miscellaneous Hosiery'),
('2253', 'Knit Outerwear Mills'),
('2254', 'Knit Underwear and Nightwear Mills'),
('2257', 'Weft Knit Fabric Mills'),
('2258', 'Lace and Warp Knit Fabric Mills'),
('2259', 'Knitting Mills, Not Elsewhere Classified'),
('2261', 'Finishers of Broadwoven Fabrics of Cotton'),
('2262', 'Finishers of Broadwoven Fabrics of Manmade Fibre and Silk'),
('2269', 'Finishers of Textiles, Not Elsewhere Classified'),
('2273', 'Carpets and Rugs'),
('2281', 'Yarn Spinning Mills'),
('2282', 'Yarn Texturizing, Throwing, Twisting, and Winding Mills'),
('2284', 'Thread Mills'),
('2295', 'Coated Fabrics, Not Rubberised'),
('2296', 'Tyre Cord and Fabrics'),
('2297', 'Nonwoven Fabrics'),
('2298', 'Cordage and Twine'),
('2299', 'Textile Goods, Not Elsewhere Classified'),
('2311', 'Mens and Boys Suits, Coats and Overcoats'),
('2321', 'Mens and Boys Shirts, except Work Shirts'),
('2322', 'Mens and Boys Underwear and Nightwear'),
('2323', 'Mens and Boys Neckwear'),
('2325', 'Mens and Boys Separate Trousers and Slacks'),
('2326', 'Mens and Boys Work Clothing'),
('2329', 'Miscellaneous Mens and Boys Clothing'),
('2331', 'Womens, Misses and Juniors Blouses and Shirts'),
('2335', 'Womens, Misses and Juniors Dresses'),
('2337', 'Womens, Misses and Juniors Suits, Skirts, and Coats'),
('2339', 'Womens, Misses and Juniors Outerwear, Not Elsewhere Classified'),
('2341', 'Womens, Misses, Childrens and Infants Underwear and Nightwear'),
('2342', 'Brassieres, Girdles and Allied Garments'),
('2353', 'Hats, Caps and Millinery'),
('2361', 'Girls, Childrens and Infants Dresses, Blouses, and Shirts'),
('2369', 'Girls, Childrens and Infants Outerwear, Not Elsewhere Classified'),
('2371', 'Fur Goods'),
('2381', 'Dress and Work Gloves, except Knit and All-Leather'),
('2384', 'Robes and Dressing Gowns'),
('2385', 'Waterproof Outerwear'),
('2386', 'Leather and Sheep-Lined Clothing'),
('2387', 'Apparel Belts'),
('2389', 'Apparel and Accessories, Not Elsewhere Classified'),
('2391', 'Curtains and Draperies'),
('2392', 'House Furnishings, except Curtains and Draperies'),
('2393', 'Textile Bags'),
('2394', 'Canvas and Related Products'),
('2395', 'Pleating, Decorative and Novelty Stitching and Tucking for the Trade'),
('2396', 'Automotive Trimmings, Apparel Findings and Related Products'),
('2397', 'Schiffli Machine Embroideries'),
('2399', 'Fabricated Textile Products, Not Elsewhere Classified'),
('2411', 'Logging'),
('2421', 'Sawmills and Planing Mills, General'),
('2426', 'Hardwood Dimension and Flooring Mills'),
('2429', 'Special Product Sawmills, Not Elsewhere Classified'),
('2431', 'Millwork'),
('2434', 'Wood Kitchen Cabinets'),
('2435', 'Hardwood Veneer and Plywood'),
('2436', 'Softwood Veneer and Plywood'),
('2439', 'Structural Wood Members, Not Elsewhere Classified'),
('2441', 'Nailed and Lock Corner Wood Boxes and Shook'),
('2448', 'Wood Pallets and Skids'),
('2449', 'Wood Containers, Not Elsewhere Classified'),
('2451', 'Mobile Homes'),
('2452', 'Prefabricated Wood Buildings and Components'),
('2491', 'Wood Preserving'),
('2493', 'Reconstituted Wood Products'),
('2499', 'Wood Products, Not Elsewhere Classified'),
('2511', 'Wood Household Furniture, except Upholstered'),
('2512', 'Wood Household Furniture, Upholstered'),
('2514', 'Metal Household Furniture'),
('2515', 'Mattresses, Foundations and Convertible Beds'),
('2517', 'Wood Television, Radio, Phonograph and Sewing Machine Cabinets'),
('2519', 'Household Furniture, Not Elsewhere Classified'),
('2521', 'Wood Office Furniture'),
('2522', 'Office Furniture, except Wood'),
('2531', 'Public Building and Related Furniture'),
('2541', 'Wood Office and Store Fixtures, Partitions, Shelving and Lockers'),
('2542', 'Office and Store Fixtures, Partitions, Shelving and Lockers, except Wood'),
('2591', 'Drapery Hardware and Window Blinds and Shades'),
('2599', 'Furniture and Fixtures, Not Elsewhere Classified'),
('2611', 'Pulp Mills'),
('2621', 'Paper Mills'),
('2631', 'Paperboard Mills'),
('2652', 'Setup Paperboard Boxes'),
('2653', 'Corrugated and Solid Fibre Boxes'),
('2655', 'Fibre Cans, Tubes, Drums and Similar Products'),
('2656', 'Sanitary Food Containers, except Folding'),
('2657', 'Folding Paperboard Boxes, Including Sanitary'),
('2671', 'Packaging Paper and Plastics Film, Coated and Laminated'),
('2672', 'Coated and Laminated Paper, Not Elsewhere Classified'),
('2673', 'Plastics, Foil and Coated Paper Bags'),
('2674', 'Uncoated Paper and Multiwall Bags'),
('2675', 'Die-Cut Paper and Paperboard and Cardboard'),
('2676', 'Sanitary Paper Products'),
('2677', 'Envelopes'),
('2678', 'Stationery, Tablets and Related Products'),
('2679', 'Converted Paper and Paperboard Products, Not Elsewhere Classified'),
('2711', 'Newspapers: Publishing, or Publishing and Printing'),
('2721', 'Periodicals: Publishing, or Publishing and Printing'),
('2731', 'Books: Publishing, or Publishing and Printing'),
('2732', 'Book Printing'),
('2741', 'Miscellaneous Publishing'),
('2752', 'Commercial Printing, Lithographic'),
('2754', 'Commercial Printing, Gravure'),
('2759', 'Commercial Printing, Not Elsewhere Classified'),
('2761', 'Manifold Business Forms'),
('2771', 'Greeting Cards'),
('2782', 'Blankbooks, Looseleaf Binders and Devices'),
('2789', 'Bookbinding and Related Work'),
('2791', 'Typesetting'),
('2796', 'Platemaking and Related Services'),
('2812', 'Alkalies and Chlorine'),
('2813', 'Industrial Gases'),
('2816', 'Inorganic Pigments'),
('2819', 'Industrial Inorganic Chemicals, Not Elsewhere Classified'),
('2821', 'Plastics Materials, Synthetic Resins and Nonvulcanisable Elastomers'),
('2822', 'Synthetic Rubber (Vulcanisable Elastomers)'),
('2823', 'Cellulosic Manmade Fibres'),
('2824', 'Manmade Organic Fibres, except Cellulosic'),
('2833', 'Medicinal Chemicals and Botanical Products'),
('2834', 'Pharmaceutical Preparations'),
('2835', 'In Vitro and In Vivo Diagnostic Substances'),
('2836', 'Biological Products, except Diagnostic Substances'),
('2841', 'Soap and other Detergents, except Specialty Cleaners'),
('2842', 'Specialty Cleaning, Polishing and Sanitation Preparations'),
('2843', 'Surface Active Agents, Finishing Agents, Sulfonated Oils, and Assistants'),
('2844', 'Perfumes, Cosmetics and other Toilet Preparations'),
('2851', 'Paints, Varnishes, Lacquers, Enamels and Allied Products'),
('2861', 'Gum and Wood Chemicals'),
('2865', 'Cyclic Organic Crudes and Intermediates and Organic Dyes and Pigments'),
('2869', 'Industrial Organic Chemicals, Not Elsewhere Classified'),
('2873', 'Nitrogenous Fertilisers'),
('2874', 'Phosphatic Fertilisers'),
('2875', 'Fertilisers, Mixing Only'),
('2879', 'Pesticides and Agricultural Chemicals, Not Elsewhere Classified'),
('2891', 'Adhesives and Sealants'),
('2892', 'Explosives'),
('2893', 'Printing Ink'),
('2895', 'Carbon Black'),
('2899', 'Chemicals and Chemical Preparations, Not Elsewhere Classified'),
('2911', 'Petroleum Refining'),
('2951', 'Asphalt Paving Mixtures and Blocks'),
('2952', 'Asphalt Felts and Coatings'),
('2992', 'Lubricating Oils and Greases'),
('2999', 'Products of Petroleum and Coal, Not Elsewhere Classified'),
('3011', 'Tyres and Inner Tubes'),
('3021', 'Rubber and Plastics Footwear'),
('3052', 'Rubber and Plastics Hose and Belting'),
('3053', 'Gaskets, Packing and Sealing Devices'),
('3061', 'Molded, Extruded and Lathe-Cut Mechanical Rubber Goods'),
('3069', 'Fabricated Rubber Products, Not Elsewhere Classified'),
('3081', 'Unsupported Plastics Film and Sheet'),
('3082', 'Unsupported Plastics Profile Shapes'),
('3083', 'Laminated Plastics Plate, Sheet and Profile Shapes'),
('3084', 'Plastics Pipe'),
('3085', 'Plastics Bottles'),
('3086', 'Plastics Foam Products'),
('3087', 'Custom Compounding of Purchased Plastics Resins'),
('3088', 'Plastics Plumbing Fixtures'),
('3089', 'Plastics Products, Not Elsewhere Classified'),
('3111', 'Leather Tanning and Finishing'),
('3131', 'Boot and Shoe Cut Stock and Findings'),
('3142', 'House Slippers'),
('3143', 'Mens Footwear, except Athletic'),
('3144', 'Womens Footwear, except Athletic'),
('3149', 'Footwear, except Rubber, Not Elsewhere Classified'),
('3151', 'Leather Gloves and Mittens'),
('3161', 'Luggage'),
('3171', 'Womens Handbags and Purses'),
('3172', 'Personal Leather Goods, except Womens Handbags and Purses'),
('3199', 'Leather Goods, Not Elsewhere Classified'),
('3211', 'Flat Glass'),
('3221', 'Glass Containers'),
('3229', 'Pressed and Blown Glass and Glassware, Not Elsewhere Classified'),
('3231', 'Glass Products, Made of Purchased Glass'),
('3241', 'Cement, Hydraulic'),
('3251', 'Brick and Structural Clay Tile'),
('3253', 'Ceramic Wall and Floor Tile'),
('3255', 'Clay Refractories'),
('3259', 'Structural Clay Products, Not Elsewhere Classified'),
('3261', 'Vitreous China Plumbing Fixtures & China & Earthenware Fittings & Bathroom Acce.'),
('3262', 'Vitreous China Table and Kitchen Articles'),
('3263', 'Fine Earthenware (Whiteware) Table and Kitchen Articles'),
('3264', 'Porcelain Electrical Supplies'),
('3269', 'Pottery Products, Not Elsewhere Classified'),
('3271', 'Concrete Block and Brick'),
('3272', 'Concrete Products, except Block and Brick'),
('3273', 'Ready-Mixed Concrete'),
('3274', 'Lime'),
('3275', 'Gypsum Products'),
('3281', 'Cut Stone and Stone Products'),
('3291', 'Abrasive Products'),
('3292', 'Asbestos Products'),
('3295', 'Minerals and Earths, Ground or Otherwise Treated'),
('3296', 'Mineral Wool'),
('3297', 'Nonclay Refractories'),
('3299', 'Nonmetallic Mineral Products, Not Elsewhere Classified'),
('3312', 'Steel Works, Blast Furnaces (Including Coke Ovens) and Rolling Mills'),
('3313', 'Electrometallurgical Products, except Steel'),
('3315', 'Steel Wiredrawing and Steel Nails and Spikes'),
('3316', 'Cold-Rolled Steel Sheet, Strip and Bars'),
('3317', 'Steel Pipe and Tubes'),
('3321', 'Gray and Ductile Iron Foundries'),
('3322', 'Malleable Iron Foundries'),
('3324', 'Steel Investment Foundries'),
('3325', 'Steel Foundries, Not Elsewhere Classified'),
('3331', 'Primary Smelting and Refining of Copper'),
('3334', 'Primary Production of Aluminium'),
('3339', 'Primary Smelting and Refining of Nonferrous Metals, except Copper and Aluminium'),
('3341', 'Secondary Smelting and Refining of Nonferrous Metals'),
('3351', 'Rolling, Drawing and Extruding of Copper'),
('3353', 'Aluminium Sheet, Plate and Foil'),
('3354', 'Aluminium Extruded Products'),
('3355', 'Aluminium Rolling and Drawing, Not Elsewhere Classified'),
('3356', 'Rolling, Drawing and Extruding of Nonferrous Metals, except Copper and Aluminium'),
('3357', 'Drawing and Insulating of Nonferrous Wire'),
('3363', 'Aluminium Die-Castings'),
('3364', 'Nonferrous Die-Castings, except Aluminium'),
('3365', 'Aluminium Foundries'),
('3366', 'Copper Foundries'),
('3369', 'Nonferrous Foundries, except Aluminium and Copper'),
('3398', 'Metal Heat Treating'),
('3399', 'Primary Metal Products, Not Elsewhere Classified'),
('3411', 'Metal Cans'),
('3412', 'Metal Shipping Barrels, Drums, Kegs and Pails'),
('3421', 'Cutlery'),
('3423', 'Hand and Edge Tools, except Machine Tools and Handsaws'),
('3425', 'Saw Blades and Handsaws'),
('3429', 'Hardware, Not Elsewhere Classified'),
('3431', 'Enamelled Iron and Metal Sanitary Ware'),
('3432', 'Plumbing Fixture Fittings and Trim'),
('3433', 'Heating Equipment, except Electric and Warm Air Furnaces'),
('3441', 'Fabricated Structural Metal'),
('3442', 'Metal Doors, Sash, Frames, Molding and Trim'),
('3443', 'Fabricated Plate Work (Boiler Shops)'),
('3444', 'Sheet Metalwork'),
('3446', 'Architectural and Ornamental Metalwork'),
('3448', 'Prefabricated Metal Buildings and Components'),
('3449', 'Miscellaneous Structural Metalwork'),
('3451', 'Screw Machine Products'),
('3452', 'Bolts, Nuts, Screws, Rivets and Washers'),
('3462', 'Iron and Steel Forgings'),
('3463', 'Nonferrous Forgings'),
('3465', 'Automotive Stampings'),
('3466', 'Crowns and Closures'),
('3469', 'Metal Stampings, Not Elsewhere Classified'),
('3471', 'Electroplating, Plating, Polishing, Anodising and Colouring'),
('3479', 'Coating, Engraving and Allied Services, Not Elsewhere Classified'),
('3482', 'Small Arms Ammunition'),
('3483', 'Ammunition, except for Small Arms'),
('3484', 'Small Arms'),
('3489', 'Ordnance and Accessories, Not Elsewhere Classified'),
('3491', 'Industrial Valves'),
('3492', 'Fluid Power Valves and Hose Fittings'),
('3493', 'Steel Springs, except Wire'),
('3494', 'Valves and Pipe Fittings, Not Elsewhere Classified'),
('3495', 'Wire Springs'),
('3496', 'Miscellaneous Fabricated Wire Products'),
('3497', 'Metal Foil and Leaf'),
('3498', 'Fabricated Pipe and Pipe Fittings'),
('3499', 'Fabricated Metal Products, Not Elsewhere Classified'),
('3511', 'Turbines and Turbine Generator Sets'),
('3519', 'Internal Combustion Engines, Not Elsewhere Classified'),
('3523', 'Farm Machinery and Equipment'),
('3524', 'Lawn and Garden Tractors and Home Lawn and Garden Equipment'),
('3531', 'Construction Machinery and Equipment'),
('3532', 'Mining Machinery and Equipment, except Oil and Gas Field Machinery and Equipment'),
('3533', 'Oil and Gas Field Machinery and Equipment'),
('3534', 'Elevators and Moving Stairways'),
('3535', 'Conveyors and Conveying Equipment'),
('3536', 'Overhead Travelling Cranes, Hoists and Monorail Systems'),
('3537', 'Industrial Trucks, Tractors, Trailers and Stackers'),
('3541', 'Machine Tools, Metal Cutting Types'),
('3542', 'Machine Tools, Metal Forming Types'),
('3543', 'Industrial Patterns'),
('3544', 'Special Dies and Tools, Die Sets, Jigs and Fixtures and Industrial Moulds'),
('3545', 'Cutting Tools, Machine Tool Accessories and Machinists Precision Measuring Devices'),
('3546', 'Power-Driven Handtools'),
('3547', 'Rolling Mill Machinery and Equipment'),
('3548', 'Electric and Gas Welding and Soldering Equipment'),
('3549', 'Metalworking Machinery, Not Elsewhere Classified'),
('3552', 'Textile Machinery'),
('3553', 'Woodworking Machinery'),
('3554', 'Paper Industries Machinery'),
('3555', 'Printing Trades Machinery and Equipment'),
('3556', 'Food Products Machinery'),
('3559', 'Special Industry Machinery, Not Elsewhere Classified'),
('3561', 'Pumps and Pumping Equipment'),
('3562', 'Ball and Roller Bearings'),
('3563', 'Air and Gas Compressors'),
('3564', 'Industrial and Commercial Fans and Blowers and Air Purification Equipment'),
('3565', 'Packaging Machinery'),
('3566', 'Speed Changers, Industrial High-Speed Drives and Gears'),
('3567', 'Industrial Process Furnaces and Ovens'),
('3568', 'Mechanical Power Transmission Equipment, Not Elsewhere Classified'),
('3569', 'General Industrial Machinery and Equipment, Not Elsewhere Classified'),
('3571', 'Electronic Computers'),
('3572', 'Computer Storage Devices'),
('3575', 'Computer Terminals'),
('3577', 'Computer Peripheral Equipment, Not Elsewhere Classified'),
('3578', 'Calculating and Accounting Machines, except Electronic Computers'),
('3579', 'Office Machines, Not Elsewhere Classified'),
('3581', 'Automatic Vending Machines'),
('3582', 'Commercial Laundry, Drycleaning and Pressing Machines'),
('3585', 'Air Conditioning & Warm Air Heating Equipment & Commercial & Indust Refrigeration Equip'),
('3586', 'Measuring and Dispensing Pumps'),
('3589', 'Service Industry Machinery, Not Elsewhere Classified'),
('3592', 'Carburettors, Pistons, Piston Rings, and Valves'),
('3593', 'Fluid Power Cylinders and Actuators'),
('3594', 'Fluid Power Pumps and Motors'),
('3596', 'Scales and Balances, except Laboratory'),
('3599', 'Industrial and Commercial Machinery and Equipment, Not Elsewhere Classified'),
('3612', 'Power, Distribution and Specialty Transformers'),
('3613', 'Switchgear and Switchboard Apparatus'),
('3621', 'Motors and Generators'),
('3624', 'Carbon and Graphite Products'),
('3625', 'Relays and Industrial Controls'),
('3629', 'Electrical Industrial Apparatus, Not Elsewhere Classified'),
('3631', 'Household Cooking Equipment'),
('3632', 'Household Refrigerators and Home and Farm Freezers'),
('3633', 'Household Laundry Equipment'),
('3634', 'Electric Housewares and Fans'),
('3635', 'Household Vacuum Cleaners'),
('3639', 'Household Appliances, Not Elsewhere Classified'),
('3641', 'Electric Lamp Bulbs and Tubes'),
('3643', 'Current-Carrying Wiring Devices'),
('3644', 'Noncurrent-Carrying Wiring Devices'),
('3645', 'Residential Electric Lighting Fixtures'),
('3646', 'Commercial, Industrial and Institutional Electric Lighting Fixtures'),
('3647', 'Vehicular Lighting Equipment'),
('3648', 'Lighting Equipment, Not Elsewhere Classified'),
('3651', 'Household Audio and Video Equipment'),
('3652', 'Phonograph Records and Prerecorded Audio Tapes and Disks'),
('3661', 'Telephone and Telegraph Apparatus'),
('3663', 'Radio and Television Broadcasting and Communications Equipment'),
('3669', 'Communications Equipment, Not Elsewhere Classified'),
('3671', 'Electron Tubes'),
('3672', 'Printed Circuit Boards'),
('3674', 'Semiconductors and Related Devices'),
('3675', 'Electronic Capacitors'),
('3676', 'Electronic Resistors'),
('3677', 'Electronic Coils, Transformers and other Inductors'),
('3678', 'Electronic Connectors'),
('3679', 'Electronic Components, Not Elsewhere Classified'),
('3691', 'Storage Batteries'),
('3692', 'Primary Batteries, Dry and Wet'),
('3694', 'Electrical Equipment for Internal Combustion Engines'),
('3695', 'Magnetic and Optical Recording Media'),
('3699', 'Electrical Machinery, Equipment and Supplies, Not Elsewhere Classified'),
('3711', 'Motor Vehicles and Passenger Car Bodies'),
('3713', 'Truck and Bus Bodies'),
('3714', 'Motor Vehicle Parts and Accessories'),
('3715', 'Truck Trailers'),
('3716', 'Motor Homes'),
('3721', 'Aircraft'),
('3724', 'Aircraft Engines and Engine Parts'),
('3728', 'Aircraft Parts and Auxiliary Equipment, Not Elsewhere Classified'),
('3731', 'Ship Building and Repairing'),
('3732', 'Boat Building and Repairing'),
('3743', 'Railroad Equipment'),
('3751', 'Motorcycles, Bicycles and Parts'),
('3761', 'Guided Missiles and Space Vehicles'),
('3764', 'Guided Missile and Space Vehicle Propulsion Unit Parts'),
('3769', 'Guided Missile and Space Vehicle Parts and Auxiliary Equipment, Not Elsewhere Classified'),
('3792', 'Travel Trailers and Campers'),
('3795', 'Tanks and Tank Components'),
('3799', 'Transportation Equipment, Not Elsewhere Classified'),
('3812', 'Search, Detection, Navigation, Guidance, Aeronautical & Nautical Systems and Instruments'),
('3821', 'Laboratory Apparatus and Furniture'),
('3822', 'Automatic Controls for Regulating Residential and Commercial Environments and Appliances'),
('3823', 'Industrial Instruments for Measurement, Display & Control of Process Variables'),
('3824', 'Totalising Fluid Meters and Counting Devices'),
('3825', 'Instruments for Measuring and Testing of Electricity and Electrical Signals'),
('3826', 'Laboratory Analytical Instruments'),
('3827', 'Optical Instruments and Lenses'),
('3829', 'Measuring and Controlling Devices, Not Elsewhere Classified'),
('3841', 'Surgical and Medical Instruments and Apparatus'),
('3842', 'Orthopaedic, Prosthetic, and Surgical Appliances and Supplies'),
('3843', 'Dental Equipment and Supplies'),
('3844', 'X-Ray Apparatus and Tubes and Related Irradiation Apparatus'),
('3845', 'Electromedical and Electrotherapeutic Apparatus'),
('3851', 'Ophthalmic Goods'),
('3861', 'Photographic Equipment and Supplies'),
('3873', 'Watches, Clocks, Clockwork Operated Devices and Parts'),
('3911', 'Jewellery, Precious Metal'),
('3914', 'Silverware, Plated Ware and Stainless Steel Ware'),
('3915', 'Jewellers Findings and Materials and Lapidary Work'),
('3931', 'Musical Instruments'),
('3942', 'Dolls and Stuffed Toys'),
('3944', 'Games, Toys and Childrens Vehicles, except Dolls and Bicycles'),
('3949', 'Sporting and Athletic Goods, Not Elsewhere Classified'),
('3951', 'Pens, Mechanical Pencils and Parts'),
('3952', 'Lead Pencils, Crayons and Artists Materials'),
('3953', 'Marking Devices'),
('3955', 'Carbon Paper and Inked Ribbons'),
('3961', 'Costume Jewellery and Costume Novelties, except Precious Metal'),
('3965', 'Fasteners, Buttons, Needles and Pins'),
('3991', 'Brooms and Brushes'),
('3993', 'Signs and Advertising Specialties'),
('3995', 'Burial Caskets'),
('3996', 'Linoleum, Asphalted-Felt-Base and other Hard Surface Floor Coverings, NEC'),
('3999', 'Manufacturing Industries, Not Elsewhere Classified'),
('4011', 'Railroads, Line-Haul Operating'),
('4013', 'Railroad Switching and Terminal Establishments'),
('4111', 'Local and Suburban Transit'),
('4119', 'Local Passenger Transportation, Not Elsewhere Classified'),
('4121', 'Taxicabs'),
('4131', 'Intercity and Rural Bus Transportation'),
('4141', 'Local Bus Charter Service'),
('4142', 'Bus Charter Service, except Local'),
('4151', 'School Buses'),
('4173', 'Terminal and Service Facilities for Motor Vehicle Passenger Transportation'),
('4212', 'Local Trucking Without Storage'),
('4213', 'Trucking, except Local'),
('4214', 'Local Trucking With Storage'),
('4215', 'Courier Services, except by Air'),
('4221', 'Farm Product Warehousing and Storage'),
('4222', 'Refrigerated Warehousing and Storage'),
('4225', 'General Warehousing and Storage'),
('4226', 'Special Warehousing and Storage, Not Elsewhere Classified'),
('4231', 'Terminal and Joint Terminal Maintenance Facilities for Motor Freight Transportation'),
('4311', 'Postal Services'),
('4412', 'Deep Sea Foreign Transportation of Freight'),
('4424', 'Deep Sea Domestic Transportation of Freight'),
('4449', 'Water Transportation of Freight, Not Elsewhere Classified'),
('4481', 'Deep Sea Transportation of Passengers, except by Ferry'),
('4482', 'Ferries'),
('4489', 'Water Transportation of Passengers, Not Elsewhere Classified'),
('4491', 'Marine Cargo Handling'),
('4492', 'Towing and Tugboat Services'),
('4493', 'Marinas'),
('4499', 'Water Transportation Services, Not Elsewhere Classified'),
('4512', 'Air Transportation, Scheduled'),
('4513', 'Air Courier Services'),
('4522', 'Air Transportation, Nonscheduled'),
('4581', 'Airports, Flying Fields and Airport Terminal Services'),
('4612', 'Crude Petroleum Pipelines'),
('4613', 'Refined Petroleum Pipelines'),
('4619', 'Pipelines, Not Elsewhere Classified'),
('4724', 'Travel Agencies'),
('4725', 'Tour Operators'),
('4729', 'Arrangement of Passenger Transportation, Not Elsewhere Classified'),
('4731', 'Arrangement of Transportation of Freight and Cargo'),
('4741', 'Rental of Railroad Cars'),
('4783', 'Packing and Crating'),
('4785', 'Fixed Facilities and Inspection and Weighing Services for Motor Vehicle Transportation'),
('4789', 'Transportation Services, Not Elsewhere Classified'),
('4812', 'Radiotelephone Communications'),
('4813', 'Telephone Communications, except Radiotelephone'),
('4822', 'Telegraph and other Message Communications'),
('4832', 'Radio Broadcasting Stations'),
('4833', 'Television Broadcasting Stations'),
('4841', 'Cable and other Pay Television Services'),
('4899', 'Communications Services, Not Elsewhere Classified'),
('4911', 'Electric Services'),
('4922', 'Natural Gas Transmission'),
('4923', 'Natural Gas Transmission and Distribution'),
('4924', 'Natural Gas Distribution'),
('4925', 'Mixed, Manufactured, or Liquefied Petroleum Gas Production and/or Distribution'),
('4931', 'Electric and other Services Combined'),
('4932', 'Gas and other Services Combined'),
('4939', 'Combination Utilities, Not Elsewhere Classified'),
('4941', 'Water Supply'),
('4952', 'Sewerage Systems'),
('4953', 'Refuse Systems'),
('4959', 'Sanitary Services, Not Elsewhere Classified'),
('4961', 'Steam and Air-Conditioning Supply'),
('4971', 'Irrigation Systems'),
('5012', 'Automobiles and other Motor Vehicles'),
('5013', 'Motor Vehicle Supplies and New Parts'),
('5014', 'Tyres and Tubes'),
('5015', 'Motor Vehicle Parts, Used'),
('5021', 'Furniture'),
('5023', 'Homefurnishings'),
('5031', 'Lumber, Plywood, Millwork and Wood Panels'),
('5032', 'Brick, Stone and Related Construction Materials'),
('5033', 'Roofing, Siding and Insulation Materials'),
('5039', 'Construction Materials, Not Elsewhere Classified'),
('5043', 'Photographic Equipment and Supplies'),
('5044', 'Office Equipment'),
('5045', 'Computers and Computer Peripheral Equipment and Software'),
('5046', 'Commercial Equipment, Not Elsewhere Classified'),
('5047', 'Medical, Dental and Hospital Equipment and Supplies'),
('5048', 'Ophthalmic Goods'),
('5049', 'Professional Equipment and Supplies, Not Elsewhere Classified'),
('5051', 'Metals Service Centres and Offices'),
('5052', 'Coal and other Minerals and Ores'),
('5063', 'Electrical Apparatus and Equipment, Wiring Supplies and Construction Materials'),
('5064', 'Electrical Appliances, Television and Radio Sets'),
('5065', 'Electronic Parts and Equipment, Not Elsewhere Classified'),
('5072', 'Hardware'),
('5074', 'Plumbing and Heating Equipment and Supplies (Hydronics)'),
('5075', 'Warm Air Heating and Air-Conditioning Equipment and Supplies'),
('5078', 'Refrigeration Equipment and Supplies'),
('5082', 'Construction and Mining (Except Petroleum) Machinery and Equipment'),
('5083', 'Farm and Garden Machinery and Equipment'),
('5084', 'Industrial Machinery and Equipment'),
('5085', 'Industrial Supplies'),
('5087', 'Service Establishment Equipment and Supplies'),
('5088', 'Transportation Equipment and Supplies, except Motor Vehicles'),
('5091', 'Sporting and Recreational Goods and Supplies'),
('5092', 'Toys and Hobby Goods and Supplies'),
('5093', 'Scrap and Waste Materials'),
('5094', 'Jewellery, Watches, Precious Stones and Precious Metals'),
('5099', 'Durable Goods, Not Elsewhere Classified'),
('5111', 'Printing and Writing Paper'),
('5112', 'Stationery and Office Supplies'),
('5113', 'Industrial and Personal Service Paper'),
('5122', 'Drugs, Drug Proprietaries and Druggists Sundries'),
('5131', 'Piece Goods, Notions and other Dry Goods'),
('5136', 'Mens and Boys Clothing and Furnishings'),
('5137', 'Womens, Childrens and Infants Clothing and Accessories'),
('5139', 'Footwear'),
('5141', 'Groceries, General Line'),
('5142', 'Packaged Frozen Foods'),
('5143', 'Dairy Products, except Dried or Canned'),
('5144', 'Poultry and Poultry Products'),
('5145', 'Confectionery'),
('5146', 'Fish and Seafoods'),
('5147', 'Meats and Meat Products'),
('5148', 'Fresh Fruits and Vegetables'),
('5149', 'Groceries and Related Products, Not Elsewhere Classified'),
('5153', 'Grain and Field Beans'),
('5154', 'Livestock'),
('5159', 'Farm-Product Raw Materials, Not Elsewhere Classified'),
('5162', 'Plastics Materials and Basic Forms and Shapes'),
('5169', 'Chemicals and Allied Products, Not Elsewhere Classified'),
('5171', 'Petroleum Bulk Stations and Terminals'),
('5172', 'Petroleum and Petroleum Products Wholesalers, except Bulk Stations and Terminals'),
('5181', 'Beer and Ale'),
('5182', 'Wine and Distilled Alcoholic Beverages'),
('5191', 'Farm Supplies'),
('5192', 'Books, Periodicals, and Newspapers'),
('5193', 'Flowers, Nursery Stock and Florists Supplies'),
('5194', 'Tobacco and Tobacco Products'),
('5198', 'Paints, Varnishes and Supplies'),
('5199', 'Nondurable Goods, Not Elsewhere Classified'),
('5211', 'Lumber and other Building Material Dealers'),
('5231', 'Paint, Glass, and Wallpaper Stores'),
('5251', 'Hardware Stores'),
('5261', 'Retail Nurseries, Lawn and Garden Supply Stores'),
('5271', 'Mobile Home Dealers'),
('5311', 'Department Stores'),
('5331', 'Variety Stores'),
('5399', 'Miscellaneous General Merchandise Stores'),
('5411', 'Grocery Stores'),
('5421', 'Meat and Fish (Seafood) Markets, Including Freezer Provisioners'),
('5431', 'Fruit and Vegetable Markets'),
('5441', 'Candy, Nut and Confectionery Stores'),
('5451', 'Dairy Products Stores'),
('5461', 'Retail Bakeries'),
('5499', 'Miscellaneous Food Stores'),
('5511', 'Motor Vehicle Dealers (New and Used)'),
('5521', 'Motor Vehicle Dealers (Used Only)'),
('5531', 'Auto and Home Supply Stores'),
('5541', 'Gasoline Service Stations'),
('5551', 'Boat Dealers'),
('5561', 'Recreational Vehicle Dealers'),
('5571', 'Motorcycle Dealers'),
('5599', 'Automotive Dealers, Not Elsewhere Classified'),
('5611', 'Mens and Boys Clothing and Accessory Stores'),
('5621', 'Womens Clothing Stores'),
('5632', 'Womens Accessory and Specialty Stores'),
('5641', 'Childrens and Infants Wear Stores'),
('5651', 'Family Clothing Stores'),
('5661', 'Shoe Stores'),
('5699', 'Miscellaneous Apparel and Accessory Stores'),
('5712', 'Furniture Stores'),
('5713', 'Floor Covering Stores'),
('5714', 'Drapery, Curtain and Upholstery Stores'),
('5719', 'Miscellaneous Homefurnishings Stores'),
('5722', 'Household Appliance Stores'),
('5731', 'Radio, Television and Consumer Electronics Stores'),
('5734', 'Computer and Computer Software Stores'),
('5735', 'Record and Prerecorded Tape Stores'),
('5736', 'Musical Instrument Stores'),
('5812', 'Eating Places'),
('5813', 'Drinking Places (Alcoholic Beverages)'),
('5912', 'Drug Stores and Proprietary Stores'),
('5921', 'Liquor Stores'),
('5932', 'Used Merchandise Stores'),
('5941', 'Sporting Goods Stores and Bicycle Shops'),
('5942', 'Book Stores'),
('5943', 'Stationery Stores'),
('5944', 'Jewellery Stores'),
('5945', 'Hobby, Toy and Game Shops'),
('5946', 'Camera and Photographic Supply Stores'),
('5947', 'Gift, Novelty and Souvenir Shops'),
('5948', 'Luggage and Leather Goods Stores'),
('5949', 'Sewing, Needlework and Piece Goods Stores'),
('5961', 'Catalogue and Mail-Order Houses'),
('5962', 'Automatic Merchandising Machine Operators'),
('5963', 'Direct Selling Establishments'),
('5983', 'Fuel Oil Dealers'),
('5984', 'Liquefied Petroleum Gas (Bottled Gas) Dealers'),
('5989', 'Fuel Dealers, Not Elsewhere Classified'),
('5992', 'Florists'),
('5993', 'Tobacco Stores and Stands'),
('5994', 'News Dealers and Newsstands'),
('5995', 'Optical Goods Stores'),
('5999', 'Miscellaneous Retail Stores, Not Elsewhere Classified'),
('6011', 'Federal Reserve Banks'),
('6019', 'Central Reserve Depository Institutions, Not Elsewhere Classified'),
('6021', 'National Commercial Banks'),
('6022', 'State Commercial Banks'),
('6029', 'Commercial Banks, Not Elsewhere Classified'),
('6035', 'Savings Institutions, Federally Chartered'),
('6036', 'Savings Institutions, Not Federally Chartered'),
('6061', 'Credit Unions, Federally Chartered'),
('6062', 'Credit Unions, Not Federally Chartered'),
('6081', 'Branches and Agencies of Foreign Banks'),
('6082', 'Foreign Trade and International Banking Institutions'),
('6091', 'Nondeposit Trust Facilities'),
('6099', 'Functions Related to Depository Banking, Not Elsewhere Classified'),
('6111', 'Federal and Federally-Sponsored Credit Agencies'),
('6141', 'Personal Credit Institutions'),
('6153', 'Short-Term Business Credit Institutions, except Agricultural'),
('6159', 'Miscellaneous Business Credit Institutions'),
('6162', 'Mortgage Bankers and Loan Correspondents'),
('6163', 'Loan Brokers'),
('6211', 'Security Brokers, Dealers and Flotation Companies'),
('6221', 'Commodity Contracts Brokers and Dealers'),
('6231', 'Security and Commodity Exchanges'),
('6282', 'Investment Advice'),
('6289', 'Services Allied with the Exchange of Securities or Commodities, Not Elsewhere Classified'),
('6311', 'Foreign Trade and International Banking Institutions'),
('6321', 'Accident and Health Insurance'),
('6324', 'Hospital and Medical Service Plans'),
('6331', 'Fire, Marine and Casualty Insurance'),
('6351', 'Surety Insurance'),
('6361', 'Title Insurance'),
('6371', 'Pension, Health and Welfare Funds'),
('6399', 'Insurance Carriers, Not Elsewhere Classified'),
('64', 'INSURANCE AGENTS, BROKERS AND SERVICE'),
('6411', 'Insurance Agents, Brokers and Service'),
('6512', 'Operators of Nonresidential Buildings'),
('6513', 'Operators of Apartment Buildings'),
('6514', 'Operators of Dwellings other than Apartment Buildings'),
('6515', 'Operators of Residential Mobile Home Sites'),
('6517', 'Lessors of Railroad Property'),
('6519', 'Lessors of Real Property'),
('6531', 'Real Estate Agents and Managers'),
('6541', 'Title Abstract Offices'),
('6552', 'Land Subdividers and Developers, except Cemeteries'),
('6553', 'Cemetery Subdividers and Developers'),
('6712', 'Offices of Bank Holding Companies'),
('6719', 'Offices of Holding Companies, Not Elsewhere Classified'),
('6722', 'Management Investment Offices, Open-End'),
('6726', 'Unit Investment Trusts, Face-Amount Certificate & Closed-End Mgmt Investment Offices'),
('6732', 'Educational, Religious and Charitable Trusts'),
('6733', 'Trusts, except Educational, Religious and Charitable'),
('6792', 'Oil Royalty Traders'),
('6794', 'Patent Owners and Lessors'),
('6798', 'Real Estate Investment Trusts'),
('6799', 'Investors, Not Elsewhere Classified'),
('7011', 'Hotels and Motels'),
('7021', 'Rooming and Boarding Houses'),
('7032', 'Sporting and Recreational Camps'),
('7033', 'Recreational Vehicle Parks and Campsites'),
('7041', 'Organisation Hotels and Lodging Houses, on Membership Basis'),
('7211', 'Power Laundries, Family and Commercial'),
('7212', 'Garment Pressing, and Agents for Laundries and Drycleaners'),
('7213', 'Linen Supply'),
('7215', 'Coin-Operated Laundries and Drycleaning'),
('7216', 'Drycleaning Plants, except Rug Cleaning'),
('7217', 'Carpet and Upholstery Cleaning'),
('7218', 'Industrial Launderers'),
('7219', 'Laundry and Garment Services, Not Elsewhere Classified'),
('7221', 'Photographic Studios, Portrait'),
('7231', 'Beauty Shops'),
('7241', 'Barber Shops'),
('7251', 'Shoe Repair Shops and Shoeshine Parlours'),
('7261', 'Funeral Service and Crematories'),
('7291', 'Tax Return Preparation Services'),
('7299', 'Miscellaneous Personal Services, Not Elsewhere Classified'),
('7311', 'Advertising Agencies'),
('7312', 'Outdoor Advertising Services'),
('7313', 'Radio, Television and Publishers Advertising Representatives'),
('7319', 'Advertising, Not Elsewhere Classified'),
('7322', 'Adjustment and Collection Services'),
('7323', 'Credit Reporting Services'),
('7331', 'Direct Mail Advertising Services'),
('7334', 'Photocopying and Duplicating Services'),
('7335', 'Commercial Photography'),
('7336', 'Commercial Art and Graphic Design'),
('7338', 'Secretarial and Court Reporting Services'),
('7342', 'Disinfecting and Pest Control Services'),
('7349', 'Building Cleaning and Maintenance Services, Not Elsewhere Classified'),
('7352', 'Medical Equipment Rental and Leasing'),
('7353', 'Heavy Construction Equipment Rental and Leasing'),
('7359', 'Equipment Rental and Leasing, Not Elsewhere Classified'),
('7361', 'Employment Agencies'),
('7363', 'Help Supply Services'),
('7371', 'Computer Programming Services'),
('7372', 'Prepackaged Software'),
('7373', 'Computer Integrated Systems Design'),
('7374', 'Computer Processing and Data Preparation and Processing Services'),
('7375', 'Information Retrieval Services'),
('7376', 'Computer Facilities Management Services'),
('7377', 'Computer Rental and Leasing'),
('7378', 'Computer Maintenance and Repair'),
('7379', 'Computer Related Services, Not Elsewhere Classified'),
('7381', 'Detective, Guard and Armoured Car Services'),
('7382', 'Security Systems Services'),
('7383', 'News Syndicates'),
('7384', 'Photofinishing Laboratories'),
('7389', 'Business Services, Not Elsewhere Classified'),
('7513', 'Truck Rental and Leasing, Without Drivers'),
('7514', 'Passenger Car Rental'),
('7515', 'Passenger Car Leasing'),
('7519', 'Utility Trailer and Recreational Vehicle Rental'),
('7521', 'Automobile Parking'),
('7532', 'Top, Body and Upholstery Repair Shops and Paint Shops'),
('7533', 'Automotive Exhaust System Repair Shops'),
('7534', 'Tyre Retreading and Repair Shops'),
('7536', 'Automotive Glass Replacement Shops'),
('7537', 'Automotive Transmission Repair Shops'),
('7538', 'General Automotive Repair Shops'),
('7539', 'Automotive Repair Shops, Not Elsewhere Classified'),
('7542', 'Car Washes'),
('7549', 'Automotive Services, except Repair and Carwashes'),
('7622', 'Radio and Television Repair Shops'),
('7623', 'Refrigeration and Air-Conditioning Service and Repair Shops'),
('7629', 'Electrical and Electronic Repair Shops, Not Elsewhere Classified'),
('7631', 'Watch, Clock and Jewellery Repair'),
('7641', 'Reupholstery and Furniture Repair'),
('7692', 'Welding Repair'),
('7694', 'Armature Rewinding Shops'),
('7699', 'Repair Shops and Related Services, Not Elsewhere Classified'),
('7812', 'Motion Picture and Video Tape Production'),
('7819', 'Services Allied to Motion Picture Production'),
('7822', 'Motion Picture and Video Tape Distribution'),
('7829', 'Services Allied to Motion Picture Distribution'),
('7832', 'Motion Picture Theatres, except Drive-In'),
('7833', 'Drive-In Motion Picture Theatres'),
('7841', 'Video Tape Rental'),
('7911', 'Dance Studios, Schools and Halls'),
('7922', 'Theatrical Producers (Except Motion Picture) and Miscellaneous Theatrical Services'),
('7929', 'Bands, Orchestras, Actors, and other Entertainers and Entertainment Groups'),
('7933', 'Bowling Centres'),
('7941', 'Professional Sports Clubs and Promoters'),
('7948', 'Racing, Including Track Operation'),
('7991', 'Physical Fitness Facilities'),
('7992', 'Public Golf Courses'),
('7993', 'Coin-Operated Amusement Devices'),
('7996', 'Amusement Parks'),
('7997', 'Membership Sports and Recreation Clubs'),
('7999', 'Amusement and Recreation Services, Not Elsewhere Classified'),
('8011', 'Offices and Clinics of Doctors of Medicine'),
('8021', 'Offices and Clinics of Dentists'),
('8031', 'Offices and Clinics of Doctors of Osteopathy'),
('8041', 'Offices and Clinics of Chiropractors'),
('8042', 'Offices and Clinics of Optometrists'),
('8043', 'Offices and Clinics of Podiatrists'),
('8049', 'Offices of Health Practitioners, Not Elsewhere Classified'),
('8051', 'Skilled Nursing Care Facilities'),
('8052', 'Intermediate Care Facilities'),
('8059', 'Nursing and Personal Care Facilities, Not Elsewhere Classified'),
('8062', 'General Medical and Surgical Hospitals'),
('8063', 'Psychiatric Hospitals'),
('8069', 'Specialty Hospitals, except Psychiatric'),
('8071', 'Medical Laboratories'),
('8072', 'Dental Laboratories'),
('8082', 'Home Health Care Services'),
('8092', 'Kidney Dialysis Centres'),
('8093', 'Specialty Outpatient Facilities, Not Elsewhere Classified'),
('8099', 'Health and Allied Services, Not Elsewhere Classified'),
('8111', 'Legal Services'),
('8211', 'Elementary and Secondary Schools'),
('8221', 'Colleges, Universities and Professional Schools'),
('8222', 'Junior Colleges and Technical Institutes'),
('8231', 'Libraries'),
('8243', 'Data Processing Schools'),
('8244', 'Business and Secretarial Schools'),
('8249', 'Vocational Schools, Not Elsewhere Classified'),
('8299', 'Schools and Educational Services, Not Elsewhere Classified'),
('8322', 'Individual and Family Social Services'),
('8331', 'Job Training and Vocational Rehabilitation Services'),
('8351', 'Child Day Care Services'),
('8361', 'Residential Care'),
('8399', 'Social Services, Not Elsewhere Classified'),
('8412', 'Museums and Art Galleries'),
('8422', 'Arboreta and Botanical or Zoological Gardens'),
('8611', 'Business Associations'),
('8621', 'Professional Membership Organisations'),
('8631', 'Labour Unions and Similar Labour Organisations'),
('8641', 'Civic, Social and Fraternal Associations'),
('8651', 'Political Organisations'),
('8661', 'Religious Organisations'),
('8699', 'Membership Organisations, Not Elsewhere Classified'),
('8711', 'Engineering Services'),
('8712', 'Architectural Services'),
('8713', 'Surveying Services'),
('8721', 'Accounting, Auditing and Bookkeeping Services'),
('8731', 'Commercial Physical and Biological Research'),
('8732', 'Commercial Economic, Sociological and Educational Research'),
('8733', 'Noncommercial Research Organisations'),
('8734', 'Testing Laboratories'),
('8741', 'Management Services'),
('8742', 'Management Consulting Services'),
('8743', 'Public Relations Services'),
('8744', 'Facilities Support Management Services'),
('8748', 'Business Consulting Services, Not Elsewhere Classified'),
('8811', 'Private Households'),
('8999', 'Services, Not Elsewhere Classified'),
('9999', 'Nonclassifiable Establishments'),
('1799', 'Special Trade Contractors, Not Elsewhere Classified');

-- --------------------------------------------------------

--
-- Table structure for table `companybank`
--

CREATE TABLE `companybank` (
  `id` int(11) NOT NULL,
  `bankName` varchar(50) NOT NULL,
  `accountName` varchar(50) NOT NULL,
  `accountNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companybank`
--

INSERT INTO `companybank` (`id`, `bankName`, `accountName`, `accountNumber`) VALUES
(1, 'Guaranty Trust Bank', 'Onestop Procurement', '1234567829');

-- --------------------------------------------------------

--
-- Table structure for table `companydetails`
--

CREATE TABLE `companydetails` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `regOfficeAdd` text NOT NULL,
  `mainOfficeAdd` text NOT NULL,
  `mainTelephon` varchar(20) NOT NULL,
  `mainFax` varchar(100) DEFAULT NULL,
  `mainEmailAdd` varchar(100) NOT NULL,
  `webName` varchar(100) NOT NULL,
  `webPhone` varchar(20) DEFAULT NULL,
  `webEmail` varchar(50) DEFAULT NULL,
  `contName` varchar(100) NOT NULL,
  `yearStartBus` date NOT NULL,
  `legalStructure` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `companyreg`
--

CREATE TABLE `companyreg` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `regNumber` varchar(50) NOT NULL,
  `dateRegister` date NOT NULL,
  `taxNo` varchar(50) NOT NULL,
  `vatNo` varchar(100) NOT NULL,
  `busStartDate` date NOT NULL,
  `industry` varchar(100) NOT NULL,
  `locationtype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `docupload`
--

CREATE TABLE `docupload` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `docname` text NOT NULL,
  `docproof` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `docdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `docupload`
--

INSERT INTO `docupload` (`id`, `userId`, `docname`, `docproof`, `status`, `docdate`) VALUES
(1, 1, 'Proof of Address', '../companyDoc/okewale.akinbosoye@gmail.com/38019.pdf', 0, '2022-07-11');

-- --------------------------------------------------------

--
-- Table structure for table `employeedetails`
--

CREATE TABLE `employeedetails` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `totalNumber` int(5) NOT NULL,
  `headOffice` int(5) NOT NULL,
  `strength` int(5) NOT NULL,
  `totalGroup` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `estimatedsales`
--

CREATE TABLE `estimatedsales` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `curYear` int(6) NOT NULL,
  `preYear` int(6) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `busLine` varchar(200) NOT NULL,
  `compDesc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `intregistration`
--

CREATE TABLE `intregistration` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `regtype` varchar(200) NOT NULL,
  `regnumber` varchar(200) NOT NULL,
  `regdate` date NOT NULL,
  `country` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intregistration`
--

INSERT INTO `intregistration` (`id`, `userId`, `regtype`, `regnumber`, `regdate`, `country`) VALUES
(1, 1, 'kccklckl', 'lkdlxck', '2022-07-07', 'lklkcxlc');

-- --------------------------------------------------------

--
-- Table structure for table `legalstructure`
--

CREATE TABLE `legalstructure` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `legalstructure`
--

INSERT INTO `legalstructure` (`id`, `name`) VALUES
(1, 'Public Limited'),
(2, 'Private Limited'),
(3, ' Partnership'),
(4, ' Proprietorship'),
(5, 'NGO'),
(6, 'Government Agency');

-- --------------------------------------------------------

--
-- Table structure for table `managementdetails`
--

CREATE TABLE `managementdetails` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `joinDate` date NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `qualification` mediumtext DEFAULT NULL,
  `profCertificate` longtext DEFAULT NULL,
  `totalExp` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `officelocation`
--

CREATE TABLE `officelocation` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officelocation`
--

INSERT INTO `officelocation` (`id`, `name`) VALUES
(1, 'Owned'),
(2, 'Rented'),
(3, 'Leased');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `proof` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `datepaid` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `userId`, `amount`, `proof`, `status`, `datepaid`) VALUES
(1, 1, 38000.00, 'paymentslip/okewale.akinbosoye@gmail.com/favicon.png', 1, '2022-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `plan` varchar(50) NOT NULL,
  `amount` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `plan`, `amount`) VALUES
(1, 'ordinary', 0),
(2, 'standard', 38000),
(3, 'premium', 65000);

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `userId` int(11) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `emailAddress` varchar(100) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `busName` varchar(200) NOT NULL,
  `busAddress` text DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `password` longtext NOT NULL,
  `dateRegister` date NOT NULL,
  `picture` varchar(50) DEFAULT 'avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `plan` varchar(70) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `userId`, `plan`, `amount`, `duration`) VALUES
(1, 1, 'ordinary', 38000.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `userId` int(11) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `emailAddress` varchar(100) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `busName` varchar(200) NOT NULL,
  `busAddress` text NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `password` longtext NOT NULL,
  `dateRegister` date NOT NULL,
  `picture` varchar(50) DEFAULT 'avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`userId`, `surname`, `firstname`, `emailAddress`, `phoneNumber`, `busName`, `busAddress`, `country`, `password`, `dateRegister`, `picture`) VALUES
(1, 'Okewale', 'Olalekan', 'okewale.akinbosoye@gmail.com', '+2348066278204', 'Opal System Solutions', 'Challenge Ibadan', 'Nigeria', '81dc9bdb52d04dc20036dbd8313ed055', '2022-06-07', 'avatar.png'),
(2, 'ffgsf', 'ffdfdf', 'adew@gmail.com', '+213867452344', 'ass', 'dff', 'Argentina', '81dc9bdb52d04dc20036dbd8313ed055', '2022-08-18', 'avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `verifyphone`
--

CREATE TABLE `verifyphone` (
  `id` int(11) NOT NULL,
  `otp` varchar(11) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `expire` int(11) NOT NULL DEFAULT 15,
  `phoneNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verifyphone`
--

INSERT INTO `verifyphone` (`id`, `otp`, `userId`, `status`, `expire`, `phoneNumber`) VALUES
(1, '986146', 1, 1, 15, '+2348066278204'),
(2, '320782', 2, 0, 15, '+213867452344');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companybank`
--
ALTER TABLE `companybank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companydetails`
--
ALTER TABLE `companydetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companyreg`
--
ALTER TABLE `companyreg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docupload`
--
ALTER TABLE `docupload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeedetails`
--
ALTER TABLE `employeedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimatedsales`
--
ALTER TABLE `estimatedsales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intregistration`
--
ALTER TABLE `intregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `legalstructure`
--
ALTER TABLE `legalstructure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managementdetails`
--
ALTER TABLE `managementdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officelocation`
--
ALTER TABLE `officelocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `verifyphone`
--
ALTER TABLE `verifyphone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companybank`
--
ALTER TABLE `companybank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companydetails`
--
ALTER TABLE `companydetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companyreg`
--
ALTER TABLE `companyreg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `docupload`
--
ALTER TABLE `docupload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employeedetails`
--
ALTER TABLE `employeedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estimatedsales`
--
ALTER TABLE `estimatedsales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intregistration`
--
ALTER TABLE `intregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `legalstructure`
--
ALTER TABLE `legalstructure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `managementdetails`
--
ALTER TABLE `managementdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `officelocation`
--
ALTER TABLE `officelocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `verifyphone`
--
ALTER TABLE `verifyphone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
