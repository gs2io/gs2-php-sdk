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

/**
 * Request for createSalesItemGroupMaster: Create Sales Item Group Master
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#createsalesitemgroupmaster
 */
class CreateSalesItemGroupMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Sales Item Group name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var array List of Sales Items included in the Sales Item Group */
    private $salesItemNames;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return CreateSalesItemGroupMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateSalesItemGroupMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Sales Item Group name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Sales Item Group name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Sales Item Group name
     * @return CreateSalesItemGroupMasterRequest
     */
	public function withName(?string $name): CreateSalesItemGroupMasterRequest {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return CreateSalesItemGroupMasterRequest
     */
	public function withDescription(?string $description): CreateSalesItemGroupMasterRequest {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return CreateSalesItemGroupMasterRequest
     */
	public function withMetadata(?string $metadata): CreateSalesItemGroupMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null List of Sales Items included in the Sales Item Group */
	public function getSalesItemNames(): ?array {
		return $this->salesItemNames;
	}
    /** @param array|null $salesItemNames List of Sales Items included in the Sales Item Group */
	public function setSalesItemNames(?array $salesItemNames) {
		$this->salesItemNames = $salesItemNames;
	}
    /**
     * @param array|null $salesItemNames List of Sales Items included in the Sales Item Group
     * @return CreateSalesItemGroupMasterRequest
     */
	public function withSalesItemNames(?array $salesItemNames): CreateSalesItemGroupMasterRequest {
		$this->salesItemNames = $salesItemNames;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateSalesItemGroupMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateSalesItemGroupMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withSalesItemNames(!array_key_exists('salesItemNames', $data) || $data['salesItemNames'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['salesItemNames']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "salesItemNames" => $this->getSalesItemNames() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getSalesItemNames()
            ),
        );
    }
}