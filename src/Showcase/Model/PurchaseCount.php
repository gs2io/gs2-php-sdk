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

namespace Gs2\Showcase\Model;

use Gs2\Core\Model\IModel;


/**
 * Number of Random Displayed Item purchases
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#purchasecount
 */
class PurchaseCount implements IModel {
	/**
     * @var string Number of Random Displayed Item purchases name
	 */
	private $name;
	/**
     * @var int Purchase count
	 */
	private $count;
    /** @return string|null Number of Random Displayed Item purchases name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Number of Random Displayed Item purchases name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Number of Random Displayed Item purchases name
     * @return PurchaseCount
     */
	public function withName(?string $name): PurchaseCount {
		$this->name = $name;
		return $this;
	}
    /** @return int|null Purchase count */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Purchase count */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Purchase count
     * @return PurchaseCount
     */
	public function withCount(?int $count): PurchaseCount {
		$this->count = $count;
		return $this;
	}

    public static function fromJson(?array $data): ?PurchaseCount {
        if ($data === null) {
            return null;
        }
        return (new PurchaseCount())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "count" => $this->getCount(),
        );
    }
}