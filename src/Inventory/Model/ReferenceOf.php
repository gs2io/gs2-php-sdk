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

namespace Gs2\Inventory\Model;

use Gs2\Core\Model\IModel;


/**
 * Reference of Possessions
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#referenceof
 */
class ReferenceOf implements IModel {
	/**
     * @var string Reference GRN
	 */
	private $referenceOfId;
	/**
     * @var string Name Identifying the Item Set
	 */
	private $name;
    /** @return string|null Reference GRN */
	public function getReferenceOfId(): ?string {
		return $this->referenceOfId;
	}
    /** @param string|null $referenceOfId Reference GRN */
	public function setReferenceOfId(?string $referenceOfId) {
		$this->referenceOfId = $referenceOfId;
	}
    /**
     * @param string|null $referenceOfId Reference GRN
     * @return ReferenceOf
     */
	public function withReferenceOfId(?string $referenceOfId): ReferenceOf {
		$this->referenceOfId = $referenceOfId;
		return $this;
	}
    /** @return string|null Name Identifying the Item Set */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Name Identifying the Item Set */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Name Identifying the Item Set
     * @return ReferenceOf
     */
	public function withName(?string $name): ReferenceOf {
		$this->name = $name;
		return $this;
	}

    public static function fromJson(?array $data): ?ReferenceOf {
        if ($data === null) {
            return null;
        }
        return (new ReferenceOf())
            ->withReferenceOfId(array_key_exists('referenceOfId', $data) && $data['referenceOfId'] !== null ? $data['referenceOfId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null);
    }

    public function toJson(): array {
        return array(
            "referenceOfId" => $this->getReferenceOfId(),
            "name" => $this->getName(),
        );
    }
}