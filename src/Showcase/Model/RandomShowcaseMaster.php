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
 * Random Showcase Master
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#randomshowcasemaster
 */
class RandomShowcaseMaster implements IModel {
	/**
     * @var string Random Showcase Master GRN
	 */
	private $showcaseId;
	/**
     * @var string Random Showcase name
	 */
	private $name;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var int Maximum number of display items to be selected
	 */
	private $maximumNumberOfChoice;
	/**
     * @var array List of Random Displayed Items subject to selection
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
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Random Showcase Master GRN */
	public function getShowcaseId(): ?string {
		return $this->showcaseId;
	}
    /** @param string|null $showcaseId Random Showcase Master GRN */
	public function setShowcaseId(?string $showcaseId) {
		$this->showcaseId = $showcaseId;
	}
    /**
     * @param string|null $showcaseId Random Showcase Master GRN
     * @return RandomShowcaseMaster
     */
	public function withShowcaseId(?string $showcaseId): RandomShowcaseMaster {
		$this->showcaseId = $showcaseId;
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
     * @return RandomShowcaseMaster
     */
	public function withName(?string $name): RandomShowcaseMaster {
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
     * @return RandomShowcaseMaster
     */
	public function withDescription(?string $description): RandomShowcaseMaster {
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
     * @return RandomShowcaseMaster
     */
	public function withMetadata(?string $metadata): RandomShowcaseMaster {
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
     * @return RandomShowcaseMaster
     */
	public function withMaximumNumberOfChoice(?int $maximumNumberOfChoice): RandomShowcaseMaster {
		$this->maximumNumberOfChoice = $maximumNumberOfChoice;
		return $this;
	}
    /** @return array|null List of Random Displayed Items subject to selection */
	public function getDisplayItems(): ?array {
		return $this->displayItems;
	}
    /** @param array|null $displayItems List of Random Displayed Items subject to selection */
	public function setDisplayItems(?array $displayItems) {
		$this->displayItems = $displayItems;
	}
    /**
     * @param array|null $displayItems List of Random Displayed Items subject to selection
     * @return RandomShowcaseMaster
     */
	public function withDisplayItems(?array $displayItems): RandomShowcaseMaster {
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
     * @return RandomShowcaseMaster
     */
	public function withBaseTimestamp(?int $baseTimestamp): RandomShowcaseMaster {
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
     * @return RandomShowcaseMaster
     */
	public function withResetIntervalHours(?int $resetIntervalHours): RandomShowcaseMaster {
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
     * @return RandomShowcaseMaster
     */
	public function withSalesPeriodEventId(?string $salesPeriodEventId): RandomShowcaseMaster {
		$this->salesPeriodEventId = $salesPeriodEventId;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return RandomShowcaseMaster
     */
	public function withCreatedAt(?int $createdAt): RandomShowcaseMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return RandomShowcaseMaster
     */
	public function withUpdatedAt(?int $updatedAt): RandomShowcaseMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return RandomShowcaseMaster
     */
	public function withRevision(?int $revision): RandomShowcaseMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?RandomShowcaseMaster {
        if ($data === null) {
            return null;
        }
        return (new RandomShowcaseMaster())
            ->withShowcaseId(array_key_exists('showcaseId', $data) && $data['showcaseId'] !== null ? $data['showcaseId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
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
            ->withSalesPeriodEventId(array_key_exists('salesPeriodEventId', $data) && $data['salesPeriodEventId'] !== null ? $data['salesPeriodEventId'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "showcaseId" => $this->getShowcaseId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
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
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}