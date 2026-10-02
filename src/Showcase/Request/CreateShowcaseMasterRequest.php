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
use Gs2\Showcase\Model\DisplayItemMaster;

/**
 * Request for createShowcaseMaster: Create Showcase Master
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#createshowcasemaster
 */
class CreateShowcaseMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Showcase name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var array List of Display Items */
    private $displayItems;
    /** @var string GRN of the GS2-Schedule event that defines the sales period for the Showcase */
    private $salesPeriodEventId;
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
     * @return CreateShowcaseMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateShowcaseMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Showcase name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Showcase name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Showcase name
     * @return CreateShowcaseMasterRequest
     */
	public function withName(?string $name): CreateShowcaseMasterRequest {
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
     * @return CreateShowcaseMasterRequest
     */
	public function withDescription(?string $description): CreateShowcaseMasterRequest {
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
     * @return CreateShowcaseMasterRequest
     */
	public function withMetadata(?string $metadata): CreateShowcaseMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null List of Display Items */
	public function getDisplayItems(): ?array {
		return $this->displayItems;
	}
    /** @param array|null $displayItems List of Display Items */
	public function setDisplayItems(?array $displayItems) {
		$this->displayItems = $displayItems;
	}
    /**
     * @param array|null $displayItems List of Display Items
     * @return CreateShowcaseMasterRequest
     */
	public function withDisplayItems(?array $displayItems): CreateShowcaseMasterRequest {
		$this->displayItems = $displayItems;
		return $this;
	}
    /** @return string|null GRN of the GS2-Schedule event that defines the sales period for the Showcase */
	public function getSalesPeriodEventId(): ?string {
		return $this->salesPeriodEventId;
	}
    /** @param string|null $salesPeriodEventId GRN of the GS2-Schedule event that defines the sales period for the Showcase */
	public function setSalesPeriodEventId(?string $salesPeriodEventId) {
		$this->salesPeriodEventId = $salesPeriodEventId;
	}
    /**
     * @param string|null $salesPeriodEventId GRN of the GS2-Schedule event that defines the sales period for the Showcase
     * @return CreateShowcaseMasterRequest
     */
	public function withSalesPeriodEventId(?string $salesPeriodEventId): CreateShowcaseMasterRequest {
		$this->salesPeriodEventId = $salesPeriodEventId;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateShowcaseMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateShowcaseMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withDisplayItems(!array_key_exists('displayItems', $data) || $data['displayItems'] === null ? null : array_map(
                function ($item) {
                    return DisplayItemMaster::fromJson($item);
                },
                $data['displayItems']
            ))
            ->withSalesPeriodEventId(array_key_exists('salesPeriodEventId', $data) && $data['salesPeriodEventId'] !== null ? $data['salesPeriodEventId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "displayItems" => $this->getDisplayItems() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getDisplayItems()
            ),
            "salesPeriodEventId" => $this->getSalesPeriodEventId(),
        );
    }
}