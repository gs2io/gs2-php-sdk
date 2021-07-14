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


class Showcase implements IModel {
	/**
     * @var string
	 */
	private $showcaseId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var string
	 */
	private $salesPeriodEventId;
	/**
     * @var array
	 */
	private $displayItems;

	public function getShowcaseId(): ?string {
		return $this->showcaseId;
	}

	public function setShowcaseId(?string $showcaseId) {
		$this->showcaseId = $showcaseId;
	}

	public function withShowcaseId(?string $showcaseId): Showcase {
		$this->showcaseId = $showcaseId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): Showcase {
		$this->name = $name;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): Showcase {
		$this->metadata = $metadata;
		return $this;
	}

	public function getSalesPeriodEventId(): ?string {
		return $this->salesPeriodEventId;
	}

	public function setSalesPeriodEventId(?string $salesPeriodEventId) {
		$this->salesPeriodEventId = $salesPeriodEventId;
	}

	public function withSalesPeriodEventId(?string $salesPeriodEventId): Showcase {
		$this->salesPeriodEventId = $salesPeriodEventId;
		return $this;
	}

	public function getDisplayItems(): ?array {
		return $this->displayItems;
	}

	public function setDisplayItems(?array $displayItems) {
		$this->displayItems = $displayItems;
	}

	public function withDisplayItems(?array $displayItems): Showcase {
		$this->displayItems = $displayItems;
		return $this;
	}

    public static function fromJson(?array $data): ?Showcase {
        if ($data === null) {
            return null;
        }
        return (new Showcase())
            ->withShowcaseId(empty($data['showcaseId']) ? null : $data['showcaseId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withSalesPeriodEventId(empty($data['salesPeriodEventId']) ? null : $data['salesPeriodEventId'])
            ->withDisplayItems(array_map(
                function ($item) {
                    return DisplayItem::fromJson($item);
                },
                array_key_exists('displayItems', $data) && $data['displayItems'] !== null ? $data['displayItems'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "showcaseId" => $this->getShowcaseId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "salesPeriodEventId" => $this->getSalesPeriodEventId(),
            "displayItems" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getDisplayItems() !== null && $this->getDisplayItems() !== null ? $this->getDisplayItems() : []
            ),
        );
    }
}