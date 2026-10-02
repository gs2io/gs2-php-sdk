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
 * Showcase
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#showcase
 */
class Showcase implements IModel {
	/**
     * @var string Showcase GRN
	 */
	private $showcaseId;
	/**
     * @var string Showcase name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var string GRN of the GS2-Schedule event that defines the sales period for the Showcase
	 */
	private $salesPeriodEventId;
	/**
     * @var array List of Display Items
	 */
	private $displayItems;
    /** @return string|null Showcase GRN */
	public function getShowcaseId(): ?string {
		return $this->showcaseId;
	}
    /** @param string|null $showcaseId Showcase GRN */
	public function setShowcaseId(?string $showcaseId) {
		$this->showcaseId = $showcaseId;
	}
    /**
     * @param string|null $showcaseId Showcase GRN
     * @return Showcase
     */
	public function withShowcaseId(?string $showcaseId): Showcase {
		$this->showcaseId = $showcaseId;
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
     * @return Showcase
     */
	public function withName(?string $name): Showcase {
		$this->name = $name;
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
     * @return Showcase
     */
	public function withMetadata(?string $metadata): Showcase {
		$this->metadata = $metadata;
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
     * @return Showcase
     */
	public function withSalesPeriodEventId(?string $salesPeriodEventId): Showcase {
		$this->salesPeriodEventId = $salesPeriodEventId;
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
     * @return Showcase
     */
	public function withDisplayItems(?array $displayItems): Showcase {
		$this->displayItems = $displayItems;
		return $this;
	}

    public static function fromJson(?array $data): ?Showcase {
        if ($data === null) {
            return null;
        }
        return (new Showcase())
            ->withShowcaseId(array_key_exists('showcaseId', $data) && $data['showcaseId'] !== null ? $data['showcaseId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withSalesPeriodEventId(array_key_exists('salesPeriodEventId', $data) && $data['salesPeriodEventId'] !== null ? $data['salesPeriodEventId'] : null)
            ->withDisplayItems(!array_key_exists('displayItems', $data) || $data['displayItems'] === null ? null : array_map(
                function ($item) {
                    return DisplayItem::fromJson($item);
                },
                $data['displayItems']
            ));
    }

    public function toJson(): array {
        return array(
            "showcaseId" => $this->getShowcaseId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "salesPeriodEventId" => $this->getSalesPeriodEventId(),
            "displayItems" => $this->getDisplayItems() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getDisplayItems()
            ),
        );
    }
}