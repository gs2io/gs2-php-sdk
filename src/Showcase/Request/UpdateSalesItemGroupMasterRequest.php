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

namespace Gs2\Showcase\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class UpdateSalesItemGroupMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $salesItemGroupName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var array */
    private $salesItemNames;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): UpdateSalesItemGroupMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getSalesItemGroupName(): ?string {
		return $this->salesItemGroupName;
	}

	public function setSalesItemGroupName(?string $salesItemGroupName) {
		$this->salesItemGroupName = $salesItemGroupName;
	}

	public function withSalesItemGroupName(?string $salesItemGroupName): UpdateSalesItemGroupMasterRequest {
		$this->salesItemGroupName = $salesItemGroupName;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): UpdateSalesItemGroupMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): UpdateSalesItemGroupMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getSalesItemNames(): ?array {
		return $this->salesItemNames;
	}

	public function setSalesItemNames(?array $salesItemNames) {
		$this->salesItemNames = $salesItemNames;
	}

	public function withSalesItemNames(?array $salesItemNames): UpdateSalesItemGroupMasterRequest {
		$this->salesItemNames = $salesItemNames;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateSalesItemGroupMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateSalesItemGroupMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withSalesItemGroupName(array_key_exists('salesItemGroupName', $data) && $data['salesItemGroupName'] !== null ? $data['salesItemGroupName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withSalesItemNames(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('salesItemNames', $data) && $data['salesItemNames'] !== null ? $data['salesItemNames'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "salesItemGroupName" => $this->getSalesItemGroupName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "salesItemNames" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getSalesItemNames() !== null && $this->getSalesItemNames() !== null ? $this->getSalesItemNames() : []
            ),
        );
    }
}