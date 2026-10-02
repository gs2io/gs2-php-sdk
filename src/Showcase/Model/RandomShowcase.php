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
 * Random Showcase
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#randomshowcase
 */
class RandomShowcase implements IModel {
	/**
     * @var string Random Showcase GRN
	 */
	private $randomShowcaseId;
	/**
     * @var string Random Showcase name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var int Maximum number of display items to be selected
	 */
	private $maximumNumberOfChoice;
	/**
     * @var array List of Display Items subject to selection
	 */
	private $displayItems;
	/**
     * @var int Base time for re-drawing the display items on display
	 */
	private $baseTimestamp;
	/**
     * @var int Interval (hours) between re-drawing the display items on display
	 */
	private $resetIntervalHours;
	/**
     * @var string GRN of the GS2-Schedule event that defines the sales period for the Random Showcase
	 */
	private $salesPeriodEventId;
    /** @return string|null Random Showcase GRN */
	public function getRandomShowcaseId(): ?string {
		return $this->randomShowcaseId;
	}
    /** @param string|null $randomShowcaseId Random Showcase GRN */
	public function setRandomShowcaseId(?string $randomShowcaseId) {
		$this->randomShowcaseId = $randomShowcaseId;
	}
    /**
     * @param string|null $randomShowcaseId Random Showcase GRN
     * @return RandomShowcase
     */
	public function withRandomShowcaseId(?string $randomShowcaseId): RandomShowcase {
		$this->randomShowcaseId = $randomShowcaseId;
		return $this;
	}
    /** @return string|null Random Showcase name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Random Showcase name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Random Showcase name
     * @return RandomShowcase
     */
	public function withName(?string $name): RandomShowcase {
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
     * @return RandomShowcase
     */
	public function withMetadata(?string $metadata): RandomShowcase {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return int|null Maximum number of display items to be selected */
	public function getMaximumNumberOfChoice(): ?int {
		return $this->maximumNumberOfChoice;
	}
    /** @param int|null $maximumNumberOfChoice Maximum number of display items to be selected */
	public function setMaximumNumberOfChoice(?int $maximumNumberOfChoice) {
		$this->maximumNumberOfChoice = $maximumNumberOfChoice;
	}
    /**
     * @param int|null $maximumNumberOfChoice Maximum number of display items to be selected
     * @return RandomShowcase
     */
	public function withMaximumNumberOfChoice(?int $maximumNumberOfChoice): RandomShowcase {
		$this->maximumNumberOfChoice = $maximumNumberOfChoice;
		return $this;
	}
    /** @return array|null List of Display Items subject to selection */
	public function getDisplayItems(): ?array {
		return $this->displayItems;
	}
    /** @param array|null $displayItems List of Display Items subject to selection */
	public function setDisplayItems(?array $displayItems) {
		$this->displayItems = $displayItems;
	}
    /**
     * @param array|null $displayItems List of Display Items subject to selection
     * @return RandomShowcase
     */
	public function withDisplayItems(?array $displayItems): RandomShowcase {
		$this->displayItems = $displayItems;
		return $this;
	}
    /** @return int|null Base time for re-drawing the display items on display */
	public function getBaseTimestamp(): ?int {
		return $this->baseTimestamp;
	}
    /** @param int|null $baseTimestamp Base time for re-drawing the display items on display */
	public function setBaseTimestamp(?int $baseTimestamp) {
		$this->baseTimestamp = $baseTimestamp;
	}
    /**
     * @param int|null $baseTimestamp Base time for re-drawing the display items on display
     * @return RandomShowcase
     */
	public function withBaseTimestamp(?int $baseTimestamp): RandomShowcase {
		$this->baseTimestamp = $baseTimestamp;
		return $this;
	}
    /** @return int|null Interval (hours) between re-drawing the display items on display */
	public function getResetIntervalHours(): ?int {
		return $this->resetIntervalHours;
	}
    /** @param int|null $resetIntervalHours Interval (hours) between re-drawing the display items on display */
	public function setResetIntervalHours(?int $resetIntervalHours) {
		$this->resetIntervalHours = $resetIntervalHours;
	}
    /**
     * @param int|null $resetIntervalHours Interval (hours) between re-drawing the display items on display
     * @return RandomShowcase
     */
	public function withResetIntervalHours(?int $resetIntervalHours): RandomShowcase {
		$this->resetIntervalHours = $resetIntervalHours;
		return $this;
	}
    /** @return string|null GRN of the GS2-Schedule event that defines the sales period for the Random Showcase */
	public function getSalesPeriodEventId(): ?string {
		return $this->salesPeriodEventId;
	}
    /** @param string|null $salesPeriodEventId GRN of the GS2-Schedule event that defines the sales period for the Random Showcase */
	public function setSalesPeriodEventId(?string $salesPeriodEventId) {
		$this->salesPeriodEventId = $salesPeriodEventId;
	}
    /**
     * @param string|null $salesPeriodEventId GRN of the GS2-Schedule event that defines the sales period for the Random Showcase
     * @return RandomShowcase
     */
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