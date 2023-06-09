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

namespace Gs2\Idle\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Idle\Model\AcquireAction;
use Gs2\Idle\Model\AcquireActionList;

class UpdateCategoryModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $categoryName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var int */
    private $rewardIntervalMinutes;
    /** @var int */
    private $defaultMaximumIdleMinutes;
    /** @var array */
    private $acquireActions;
    /** @var string */
    private $idlePeriodScheduleId;
    /** @var string */
    private $receivePeriodScheduleId;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateCategoryModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getCategoryName(): ?string {
		return $this->categoryName;
	}
	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}
	public function withCategoryName(?string $categoryName): UpdateCategoryModelMasterRequest {
		$this->categoryName = $categoryName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UpdateCategoryModelMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): UpdateCategoryModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getRewardIntervalMinutes(): ?int {
		return $this->rewardIntervalMinutes;
	}
	public function setRewardIntervalMinutes(?int $rewardIntervalMinutes) {
		$this->rewardIntervalMinutes = $rewardIntervalMinutes;
	}
	public function withRewardIntervalMinutes(?int $rewardIntervalMinutes): UpdateCategoryModelMasterRequest {
		$this->rewardIntervalMinutes = $rewardIntervalMinutes;
		return $this;
	}
	public function getDefaultMaximumIdleMinutes(): ?int {
		return $this->defaultMaximumIdleMinutes;
	}
	public function setDefaultMaximumIdleMinutes(?int $defaultMaximumIdleMinutes) {
		$this->defaultMaximumIdleMinutes = $defaultMaximumIdleMinutes;
	}
	public function withDefaultMaximumIdleMinutes(?int $defaultMaximumIdleMinutes): UpdateCategoryModelMasterRequest {
		$this->defaultMaximumIdleMinutes = $defaultMaximumIdleMinutes;
		return $this;
	}
	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}
	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}
	public function withAcquireActions(?array $acquireActions): UpdateCategoryModelMasterRequest {
		$this->acquireActions = $acquireActions;
		return $this;
	}
	public function getIdlePeriodScheduleId(): ?string {
		return $this->idlePeriodScheduleId;
	}
	public function setIdlePeriodScheduleId(?string $idlePeriodScheduleId) {
		$this->idlePeriodScheduleId = $idlePeriodScheduleId;
	}
	public function withIdlePeriodScheduleId(?string $idlePeriodScheduleId): UpdateCategoryModelMasterRequest {
		$this->idlePeriodScheduleId = $idlePeriodScheduleId;
		return $this;
	}
	public function getReceivePeriodScheduleId(): ?string {
		return $this->receivePeriodScheduleId;
	}
	public function setReceivePeriodScheduleId(?string $receivePeriodScheduleId) {
		$this->receivePeriodScheduleId = $receivePeriodScheduleId;
	}
	public function withReceivePeriodScheduleId(?string $receivePeriodScheduleId): UpdateCategoryModelMasterRequest {
		$this->receivePeriodScheduleId = $receivePeriodScheduleId;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateCategoryModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateCategoryModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withCategoryName(array_key_exists('categoryName', $data) && $data['categoryName'] !== null ? $data['categoryName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withRewardIntervalMinutes(array_key_exists('rewardIntervalMinutes', $data) && $data['rewardIntervalMinutes'] !== null ? $data['rewardIntervalMinutes'] : null)
            ->withDefaultMaximumIdleMinutes(array_key_exists('defaultMaximumIdleMinutes', $data) && $data['defaultMaximumIdleMinutes'] !== null ? $data['defaultMaximumIdleMinutes'] : null)
            ->withAcquireActions(array_map(
                function ($item) {
                    return AcquireActionList::fromJson($item);
                },
                array_key_exists('acquireActions', $data) && $data['acquireActions'] !== null ? $data['acquireActions'] : []
            ))
            ->withIdlePeriodScheduleId(array_key_exists('idlePeriodScheduleId', $data) && $data['idlePeriodScheduleId'] !== null ? $data['idlePeriodScheduleId'] : null)
            ->withReceivePeriodScheduleId(array_key_exists('receivePeriodScheduleId', $data) && $data['receivePeriodScheduleId'] !== null ? $data['receivePeriodScheduleId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "categoryName" => $this->getCategoryName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "rewardIntervalMinutes" => $this->getRewardIntervalMinutes(),
            "defaultMaximumIdleMinutes" => $this->getDefaultMaximumIdleMinutes(),
            "acquireActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions() !== null && $this->getAcquireActions() !== null ? $this->getAcquireActions() : []
            ),
            "idlePeriodScheduleId" => $this->getIdlePeriodScheduleId(),
            "receivePeriodScheduleId" => $this->getReceivePeriodScheduleId(),
        );
    }
}