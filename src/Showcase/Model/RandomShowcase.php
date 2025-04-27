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


class RandomShowcase implements IModel {
	/**
     * @var string
	 */
	private $randomShowcaseId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var int
	 */
	private $maximumNumberOfChoice;
	/**
     * @var array
	 */
	private $displayItems;
	/**
     * @var int
	 */
	private $baseTimestamp;
	/**
     * @var int
	 */
	private $resetIntervalHours;
	/**
     * @var string
	 */
	private $salesPeriodEventId;
	public function getRandomShowcaseId(): ?string {
		return $this->randomShowcaseId;
	}
	public function setRandomShowcaseId(?string $randomShowcaseId) {
		$this->randomShowcaseId = $randomShowcaseId;
	}
	public function withRandomShowcaseId(?string $randomShowcaseId): RandomShowcase {
		$this->randomShowcaseId = $randomShowcaseId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): RandomShowcase {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): RandomShowcase {
		$this->metadata = $metadata;
		return $this;
	}
	public function getMaximumNumberOfChoice(): ?int {
		return $this->maximumNumberOfChoice;
	}
	public function setMaximumNumberOfChoice(?int $maximumNumberOfChoice) {
		$this->maximumNumberOfChoice = $maximumNumberOfChoice;
	}
	public function withMaximumNumberOfChoice(?int $maximumNumberOfChoice): RandomShowcase {
		$this->maximumNumberOfChoice = $maximumNumberOfChoice;
		return $this;
	}
	public function getDisplayItems(): ?array {
		return $this->displayItems;
	}
	public function setDisplayItems(?array $displayItems) {
		$this->displayItems = $displayItems;
	}
	public function withDisplayItems(?array $displayItems): RandomShowcase {
		$this->displayItems = $displayItems;
		return $this;
	}
	public function getBaseTimestamp(): ?int {
		return $this->baseTimestamp;
	}
	public function setBaseTimestamp(?int $baseTimestamp) {
		$this->baseTimestamp = $baseTimestamp;
	}
	public function withBaseTimestamp(?int $baseTimestamp): RandomShowcase {
		$this->baseTimestamp = $baseTimestamp;
		return $this;
	}
	public function getResetIntervalHours(): ?int {
		return $this->resetIntervalHours;
	}
	public function setResetIntervalHours(?int $resetIntervalHours) {
		$this->resetIntervalHours = $resetIntervalHours;
	}
	public function withResetIntervalHours(?int $resetIntervalHours): RandomShowcase {
		$this->resetIntervalHours = $resetIntervalHours;
		return $this;
	}
	public function getSalesPeriodEventId(): ?string {
		return $this->salesPeriodEventId;
	}
	public function setSalesPeriodEventId(?string $salesPeriodEventId) {
		$this->salesPeriodEventId = $salesPeriodEventId;
	}
	public function withSalesPeriodEventId(?string $salesPeriodEventId): RandomShowcase {
		$this->salesPeriodEventId = $salesPeriodEventId;
		return $this;
	}

    public static function fromJson(?array $data): ?RandomShowcase {
        if ($data === null) {
            return null;
        }
        return (new RandomShowcase())
            ->withRandomShowcaseId(array_key_exists('randomShowcaseId', $data) && $data['randomShowcaseId'] !== null ? $data['randomShowcaseId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withMaximumNumberOfChoice(array_key_exists('maximumNumberOfChoice', $data) && $data['maximumNumberOfChoice'] !== null ? $data['maximumNumberOfChoice'] : null)
            ->withDisplayItems(!array_key_exists('displayItems', $data) || $data['displayItems'] === null ? null : array_map(
                function ($item) {
                    return RandomDisplayItemModel::fromJson($item);
                },
                $data['displayItems']
            ))
            ->withBaseTimestamp(array_key_exists('baseTimestamp', $data) && $data['baseTimestamp'] !== null ? $data['baseTimestamp'] : null)
            ->withResetIntervalHours(array_key_exists('resetIntervalHours', $data) && $data['resetIntervalHours'] !== null ? $data['resetIntervalHours'] : null)
            ->withSalesPeriodEventId(array_key_exists('salesPeriodEventId', $data) && $data['salesPeriodEventId'] !== null ? $data['salesPeriodEventId'] : null);
    }

    public function toJson(): array {
        return array(
            "randomShowcaseId" => $this->getRandomShowcaseId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "maximumNumberOfChoice" => $this->getMaximumNumberOfChoice(),
            "displayItems" => $this->getDisplayItems() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getDisplayItems()
            ),
            "baseTimestamp" => $this->getBaseTimestamp(),
            "resetIntervalHours" => $this->getResetIntervalHours(),
            "salesPeriodEventId" => $this->getSalesPeriodEventId(),
        );
    }
}