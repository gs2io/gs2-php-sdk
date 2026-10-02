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
 * Request for updateSalesItemGroupMaster: Update Sales Item Group Master
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#updatesalesitemgroupmaster
 */
class UpdateSalesItemGroupMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Sales Item Group name */
    private $salesItemGroupName;
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
     * @return UpdateSalesItemGroupMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateSalesItemGroupMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Sales Item Group name */
	public function getSalesItemGroupName(): ?string {
		return $this->salesItemGroupName;
	}
    /** @param string|null $salesItemGroupName Sales Item Group name */
	public function setSalesItemGroupName(?string $salesItemGroupName) {
		$this->salesItemGroupName = $salesItemGroupName;
	}
    /**
     * @param string|null $salesItemGroupName Sales Item Group name
     * @return UpdateSalesItemGroupMasterRequest
     */
	public function withSalesItemGroupName(?string $salesItemGroupName): UpdateSalesItemGroupMasterRequest {
		$this->salesItemGroupName = $salesItemGroupName;
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
     * @return UpdateSalesItemGroupMasterRequest
     */
	public function withDescription(?string $description): UpdateSalesItemGroupMasterRequest {
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
     * @return UpdateSalesItemGroupMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateSalesItemGroupMasterRequest {
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
     * @return UpdateSalesItemGroupMasterRequest
     */
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
            "salesItemGroupName" => $this->getSalesItemGroupName(),
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