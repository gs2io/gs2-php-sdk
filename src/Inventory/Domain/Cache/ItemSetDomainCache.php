<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Inventory\Domain\Cache;

use Gs2\Inventory\Model\ItemSet;

class ItemSetDomainCache {

    /**
     * @var array<string, ItemSet>
     */
    private $items;
    public function __construct() {
        $this->items = [];
    }

    public function update(
        ItemSet $item
    ): void {
        /**
         * @var string
         */
        $keys = join(":", [
            (string)$item->getItemName(),
            (string)$item->getName()
        ]);
        $this->items[$keys] = $item;
    }

    public function get(
        string $itemName,
        string $itemSetName
    ): ItemSet {
        /**
         * @var string
         */
        $keys = join(":", [
            (string)$itemName,
            (string)$itemSetName
        ]);
        return $this->items[$keys];
    }

    public function delete(
        ItemSet $item
    ): void {
        /**
         * @var string
         */
        $keys = join(":", [
            (string)$item->getItemName(),
            (string)$item->getName()
        ]);
        unset($this->items[$keys]);
    }
}
