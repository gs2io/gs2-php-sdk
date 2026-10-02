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
use Gs2\Showcase\Model\VerifyAction;
use Gs2\Showcase\Model\ConsumeAction;
use Gs2\Showcase\Model\AcquireAction;
use Gs2\Showcase\Model\RandomDisplayItemModel;

/**
 * Request for updateRandomShowcaseMaster: Update Random Showcase Master
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#updaterandomshowcasemaster
 */
class UpdateRandomShowcaseMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Random Showcase name */
    private $showcaseName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var int Maximum number of display items to be selected */
    private $maximumNumberOfChoice;
    /** @var array List of Random Displayed Items subject to selection */
    private $displayItems;
    /** @var int Base time for re-drawing the display items on display */
    private $baseTimestamp;
    /** @var int Interval (hours) between re-drawing the display items on display */
    private $resetIntervalHours;
    /** @var string GRN of the GS2-Schedule event that defines the sales period for the Random Showcase */
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
     * @return UpdateRandomShowcaseMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateRandomShowcaseMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Random Showcase name */
	public function getShowcaseName(): ?string {
		return $this->showcaseName;
	}
    /** @param string|null $showcaseName Random Showcase name */
	public function setShowcaseName(?string $showcaseName) {
		$this->showcaseName = $showcaseName;
	}
    /**
     * @param string|null $showcaseName Random Showcase name
     * @return UpdateRandomShowcaseMasterRequest
     */
	public function withShowcaseName(?string $showcaseName): UpdateRandomShowcaseMasterRequest {
		$this->showcaseName = $showcaseName;
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
     * @return UpdateRandomShowcaseMasterRequest
     */
	public function withDescription(?string $description): UpdateRandomShowcaseMasterRequest {
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
     * @return UpdateRandomShowcaseMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateRandomShowcaseMasterRequest {
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
     * @return UpdateRandomShowcaseMasterRequest
     */
	public function withMaximumNumberOfChoice(?int $maximumNumberOfChoice): UpdateRandomShowcaseMasterRequest {
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
     * @return UpdateRandomShowcaseMasterRequest
     */
	public function withDisplayItems(?array $displayItems): UpdateRandomShowcaseMasterRequest {
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
     * @return UpdateRandomShowcaseMasterRequest
     */
	public function withBaseTimestamp(?int $baseTimestamp): UpdateRandomShowcaseMasterRequest {
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
     * @return UpdateRandomShowcaseMasterRequest
     */
	public function withResetIntervalHours(?int $resetIntervalHours): UpdateRandomShowcaseMasterRequest {
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
     * @return UpdateRandomShowcaseMasterRequest
     */
	public function withSalesPeriodEventId(?string $salesPeriodEventId): UpdateRandomShowcaseMasterRequest {
		$this->salesPeriodEventId = $salesPeriodEventId;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateRandomShowcaseMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateRandomShowcaseMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withShowcaseName(array_key_exists('showcaseName', $data) && $data['showcaseName'] !== null ? $data['showcaseName'] : null)
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
            ->withSalesPeriodEventId(array_key_exists('salesPeriodEventId', $data) && $data['salesPeriodEventId'] !== null ? $data['salesPeriodEventId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "showcaseName" => $this->getShowcaseName(),
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
        );
    }
}