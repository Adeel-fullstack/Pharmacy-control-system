@if($packaging_type === 'Sachets')
    <div class="form-group">
        <label for="number_of_boxes">Number of Boxes</label>
        <input type="number" wire:model="number_of_boxes" class="form-control">
        @error('number_of_boxes') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="items_per_box">Number of Sachets in Box</label>
        <input type="number" wire:model="items_per_box" class="form-control" wire:change="calculateTotal">
        @error('items_per_box') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="total_items">Total Sachets</label>
        <input type="text" wire:model="total_items" class="form-control" readonly>
        @error('total_items') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="purchase_price_box">Purchase Price of Box</label>
        <input type="number" wire:model="purchase_price_box" class="form-control" wire:change="calculateTotal">
        @error('purchase_price_box') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="purchase_price_each">Purchase Price of each Sachet</label>
        <input type="number" wire:model="purchase_price_each" class="form-control" readonly>
        @error('purchase_price_each') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="sale_price_box">Sale Price of Box</label>
        <input type="number" wire:model="sale_price_box" class="form-control" wire:change="calculateTotal">
        @error('sale_price_box') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="sale_price_each">Sale Price of each Sachet</label>
        <input type="number" wire:model="sale_price_each" class="form-control" readonly>
        @error('sale_price_each') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
@elseif($packaging_type === 'Blisters')
    <div class="form-group">
        <label for="number_of_boxes">Number of Boxes</label>
        <input type="number" wire:model="number_of_boxes" class="form-control">
        @error('number_of_boxes') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="items_per_box">Number of Blisters in Box</label>
        <input type="number" wire:model="items_per_box" class="form-control">
        @error('items_per_box') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="tablets_per_blister">Number of tablets in Blister</label>
        <input type="number" wire:model="tablets_per_blister" class="form-control" wire:change="calculateTotalBlisters">
        @error('tablets_per_blister') <span class="text-danger">{{ $message }}</span> @enderror 
    </div>
    <div class="form-group">
        <label for="total_items">Total Tablets</label>
        <input type="number" wire:model="total_items" class="form-control" readonly>
        @error('total_items') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="purchase_price_box">Purchase Price of Box</label>
        <input type="number" wire:model="purchase_price_box" class="form-control" wire:change="calculateTotalBlisters">
        @error('purchase_price_box') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="purchase_price_blister">Purchase Price of each Blister</label>
        <input type="number" wire:model="purchase_price_blister" class="form-control" readonly>
        @error('purchase_price_blister') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="purchase_price_each">Purchase Price of each Tablet</label>
        <input type="number" wire:model="purchase_price_each" class="form-control" readonly>
        @error('purchase_price_each') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="sale_price_box">Sale Price of Box</label>
        <input type="number" wire:model="sale_price_box" class="form-control" wire:change="calculateTotalBlisters">
        @error('sale_price_box') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="sale_price_blister">Sale Price of each Blister</label>
        <input type="number" wire:model="sale_price_blister" class="form-control" readonly>
        @error('sale_price_blister') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="sale_price_each">Sale Price of each Tablet</label>
        <input type="number" wire:model="sale_price_each" class="form-control" readonly>
        @error('sale_price_each') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
@elseif($packaging_type === 'Bottles')
    <div class="form-group">
        <label for="number_of_boxes">Number of Boxes</label>
        <input type="number" wire:model="number_of_boxes" class="form-control">
        @error('number_of_boxes') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="items_per_box">Number of Bottles in Box</label>
        <input type="number" wire:model="items_per_box" class="form-control" wire:change="calculateTotal">
        @error('items_per_box') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="total_items">Total Bottles</label>
        <input type="number" wire:model="total_items" class="form-control" readonly>
        @error('total_items') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="purchase_price_box">Purchase Price of Box</label>
        <input type="number" wire:model="purchase_price_box" class="form-control" wire:change="calculateTotal">
        @error('purchase_price_box') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="purchase_price_each">Purchase Price of each Bottle</label>
        <input type="number" wire:model="purchase_price_each" class="form-control" readonly>
        @error('purchase_price_each') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="sale_price_box">Sale Price of Box</label>
        <input type="number" wire:model="sale_price_box" class="form-control" wire:change="calculateTotal">
        @error('sale_price_box') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="sale_price_each">Sale Price of each Bottle</label>
        <input type="number" wire:model="sale_price_each" class="form-control" readonly>
        @error('sale_price_each') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
@elseif($packaging_type === 'Injections')
    <div class="form-group">
        <label for="number_of_boxes">Number of Boxes</label>
        <input type="number" wire:model="number_of_boxes" class="form-control">
        @error('number_of_boxes') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="items_per_box">Number of Injections in box</label>
        <input type="number" wire:model="items_per_box" class="form-control" wire:change="calculateTotal">
        @error('items_per_box') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="total_items">Total Injections</label>
        <input type="number" wire:model="total_items" class="form-control" readonly>
        @error('total_items') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="purchase_price_box">Purchase Price of Box</label>
        <input type="number" wire:model="purchase_price_box" class="form-control" wire:change="calculateTotal">
        @error('purchase_price_box') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="purchase_price_each">Purchase Price of each Injection</label>
        <input type="number" wire:model="purchase_price_each" class="form-control" readonly>
        @error('purchase_price_each') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="sale_price_box">Sale Price of Box</label>
        <input type="number" wire:model="sale_price_box" class="form-control" wire:change="calculateTotal">
        @error('sale_price_box') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="sale_price_each">Sale Price of each Injection</label>
        <input type="number" wire:model="sale_price_each" class="form-control" readonly>
        @error('sale_price_each') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
@elseif($packaging_type === 'Tubes')
    <div class="form-group">
        <label for="number_of_boxes">Number of Boxes</label>
        <input type="number" wire:model="number_of_boxes" class="form-control">
        @error('number_of_boxes') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="items_per_box">Number of Tubes in Box</label>
        <input type="number" wire:model="items_per_box" class="form-control" wire:change="calculateTotal">
        @error('items_per_box') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="total_items">Total Tubes</label>
        <input type="number" wire:model="total_items" class="form-control" readonly>
        @error('total_items') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="purchase_price_box">Purchase Price of Box</label>
        <input type="number" wire:model="purchase_price_box" class="form-control" wire:change="calculateTotal">
        @error('purchase_price_box') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="purchase_price_each">Purchase Price of each Tube</label>
        <input type="number" wire:model="purchase_price_each" class="form-control" readonly>
        @error('purchase_price_each') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="sale_price_box">Sale Price of Box</label>
        <input type="number" wire:model="sale_price_box" class="form-control" wire:change="calculateTotal">
        @error('sale_price_box') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="sale_price_each">Sale Price of each Tube</label>
        <input type="number" wire:model="sale_price_each" class="form-control" readonly>
        @error('sale_price_each') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
@elseif($packaging_type === 'Drops')
    <div class="form-group">
        <label for="number_of_boxes">Number of Boxes</label>
        <input type="number" wire:model="number_of_boxes" class="form-control">
        @error('number_of_boxes') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="items_per_box">Number of Drops in Box</label>
        <input type="number" wire:model="items_per_box" class="form-control" wire:change="calculateTotal">
        @error('items_per_box') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="total_items">Total Drops</label>
        <input type="number" wire:model="total_items" class="form-control" readonly>
        @error('total_items') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="purchase_price_box">Purchase Price of Box</label>
        <input type="number" wire:model="purchase_price_box" class="form-control" wire:change="calculateTotal">
        @error('purchase_price_box') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="purchase_price_each">Purchase Price of each Drop</label>
        <input type="number" wire:model="purchase_price_each" class="form-control" readonly>
        @error('purchase_price_each') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="sale_price_box">Sale Price of Box</label>
        <input type="number" wire:model="sale_price_box" class="form-control" wire:change="calculateTotal">
        @error('sale_price_box') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="sale_price_each">Sale Price of each Drop</label>
        <input type="number" wire:model="sale_price_each" class="form-control" readonly>
        @error('sale_price_each') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
@endif

