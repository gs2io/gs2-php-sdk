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
use Gs2\Showcase\Model\ConsumeAction;
use Gs2\Showcase\Model\AcquireAction;
use Gs2\Showcase\Model\RandomDisplayItemModel;

class UpdateRandomShowcaseMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $showcaseName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var int */
    private $maximumNumberOfChoice;
    /** @var array */
    private $displayItems;
    /** @var int */
    private $baseTimestamp;
    /** @var int */
    private $resetIntervalHours;
    /** @var string */
    private $salesPeriodEventId;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateRandomShowcaseMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getShowcaseName(): ?string {
		return $this->showcaseName;
	}
	public function setShowcaseName(?string $showcaseName) {
		$this->showcaseName = $showcaseName;
	}
	public function withShowcaseName(?string $showcaseName): UpdateRandomShowcaseMasterRequest {
		$this->showcaseName = $showcaseName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UpdateRandomShowcaseMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): UpdateRandomShowcaseMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getMaximumNumberOfChoice(): ?int {
		return $this->maximumNumberOfChoice;
	}
	public function setMaximumNumberOfChoice(?int $maximumNumberOfChoice) {
		$this->maximumNumberOfChoice = $maximumNumberOfChoice;
	}
	public function withMaximumNumberOfChoice(?int $maximumNumberOfChoice): UpdateRandomShowcaseMasterRequest {
		$this->maximumNumberOfChoice = $maximumNumberOfChoice;
		return $this;
	}
	public function getDisplayItems(): ?array {
		return $this->displayItems;
	}
	public function setDisplayItems(?array $displayItems) {
		$this->displayItems = $displayItems;
	}
	public function withDisplayItems(?array $displayItems): UpdateRandomShowcaseMasterRequest {
		$this->displayItems = $displayItems;
		return $this;
	}
	public function getBaseTimestamp(): ?int {
		return $this->baseTimestamp;
	}
	public function setBaseTimestamp(?int $baseTimestamp) {
		$this->baseTimestamp = $baseTimestamp;
	}
	public function withBaseTimestamp(?int $baseTimestamp): UpdateRandomShowcaseMasterRequest {
		$this->baseTimestamp = $baseTimestamp;
		return $this;
	}
	public function getResetIntervalHours(): ?int {
		return $this->resetIntervalHours;
	}
	public function setResetIntervalHours(?int $resetIntervalHours) {
		$this->resetIntervalHours = $resetIntervalHours;
	}
	public function withResetIntervalHours(?int $resetIntervalHours): UpdateRandomShowcaseMasterRequest {
		$this->resetIntervalHours = $resetIntervalHours;
		return $this;
	}
	public function getSalesPeriodEventId(): ?string {
		return $this->salesPeriodEventId;
	}
	public function setSalesPeriodEventId(?string $salesPeriodEventId) {
		$this->salesPeriodEventId = $salesPeriodEventId;
	}
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
            ->withDisplayItems(array_map(
                function ($item) {
                    return RandomDisplayItemModel::fromJson($item);
                },
                array_key_exists('displayItems', $data) && $data['displayItems'] !== null ? $data['displayItems'] : []
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
            "displayItems" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getDisplayItems() !== null && $this->getDisplayItems() !== null ? $this->getDisplayItems() : []
            ),
            "baseTimestamp" => $this->getBaseTimestamp(),
            "resetIntervalHours" => $this->getResetIntervalHours(),
            "salesPeriodEventId" => $this->getSalesPeriodEventId(),
        );
    }
}