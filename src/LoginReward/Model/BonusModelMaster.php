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

namespace Gs2\LoginReward\Model;

use Gs2\Core\Model\IModel;


class BonusModelMaster implements IModel {
	/**
     * @var string
	 */
	private $bonusModelId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var string
	 */
	private $mode;
	/**
     * @var string
	 */
	private $periodEventId;
	/**
     * @var int
	 */
	private $resetHour;
	/**
     * @var string
	 */
	private $repeat;
	/**
     * @var array
	 */
	private $rewards;
	/**
     * @var string
	 */
	private $missedReceiveRelief;
	/**
     * @var array
	 */
	private $missedReceiveReliefVerifyActions;
	/**
     * @var array
	 */
	private $missedReceiveReliefConsumeActions;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getBonusModelId(): ?string {
		return $this->bonusModelId;
	}
	public function setBonusModelId(?string $bonusModelId) {
		$this->bonusModelId = $bonusModelId;
	}
	public function withBonusModelId(?string $bonusModelId): BonusModelMaster {
		$this->bonusModelId = $bonusModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): BonusModelMaster {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): BonusModelMaster {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): BonusModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	public function getMode(): ?string {
		return $this->mode;
	}
	public function setMode(?string $mode) {
		$this->mode = $mode;
	}
	public function withMode(?string $mode): BonusModelMaster {
		$this->mode = $mode;
		return $this;
	}
	public function getPeriodEventId(): ?string {
		return $this->periodEventId;
	}
	public function setPeriodEventId(?string $periodEventId) {
		$this->periodEventId = $periodEventId;
	}
	public function withPeriodEventId(?string $periodEventId): BonusModelMaster {
		$this->periodEventId = $periodEventId;
		return $this;
	}
	public function getResetHour(): ?int {
		return $this->resetHour;
	}
	public function setResetHour(?int $resetHour) {
		$this->resetHour = $resetHour;
	}
	public function withResetHour(?int $resetHour): BonusModelMaster {
		$this->resetHour = $resetHour;
		return $this;
	}
	public function getRepeat(): ?string {
		return $this->repeat;
	}
	public function setRepeat(?string $repeat) {
		$this->repeat = $repeat;
	}
	public function withRepeat(?string $repeat): BonusModelMaster {
		$this->repeat = $repeat;
		return $this;
	}
	public function getRewards(): ?array {
		return $this->rewards;
	}
	public function setRewards(?array $rewards) {
		$this->rewards = $rewards;
	}
	public function withRewards(?array $rewards): BonusModelMaster {
		$this->rewards = $rewards;
		return $this;
	}
	public function getMissedReceiveRelief(): ?string {
		return $this->missedReceiveRelief;
	}
	public function setMissedReceiveRelief(?string $missedReceiveRelief) {
		$this->missedReceiveRelief = $missedReceiveRelief;
	}
	public function withMissedReceiveRelief(?string $missedReceiveRelief): BonusModelMaster {
		$this->missedReceiveRelief = $missedReceiveRelief;
		return $this;
	}
	public function getMissedReceiveReliefVerifyActions(): ?array {
		return $this->missedReceiveReliefVerifyActions;
	}
	public function setMissedReceiveReliefVerifyActions(?array $missedReceiveReliefVerifyActions) {
		$this->missedReceiveReliefVerifyActions = $missedReceiveReliefVerifyActions;
	}
	public function withMissedReceiveReliefVerifyActions(?array $missedReceiveReliefVerifyActions): BonusModelMaster {
		$this->missedReceiveReliefVerifyActions = $missedReceiveReliefVerifyActions;
		return $this;
	}
	public function getMissedReceiveReliefConsumeActions(): ?array {
		return $this->missedReceiveReliefConsumeActions;
	}
	public function setMissedReceiveReliefConsumeActions(?array $missedReceiveReliefConsumeActions) {
		$this->missedReceiveReliefConsumeActions = $missedReceiveReliefConsumeActions;
	}
	public function withMissedReceiveReliefConsumeActions(?array $missedReceiveReliefConsumeActions): BonusModelMaster {
		$this->missedReceiveReliefConsumeActions = $missedReceiveReliefConsumeActions;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): BonusModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): BonusModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): BonusModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?BonusModelMaster {
        if ($data === null) {
            return null;
        }
        return (new BonusModelMaster())
            ->withBonusModelId(array_key_exists('bonusModelId', $data) && $data['bonusModelId'] !== null ? $data['bonusModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withMode(array_key_exists('mode', $data) && $data['mode'] !== null ? $data['mode'] : null)
            ->withPeriodEventId(array_key_exists('periodEventId', $data) && $data['periodEventId'] !== null ? $data['periodEventId'] : null)
            ->withResetHour(array_key_exists('resetHour', $data) && $data['resetHour'] !== null ? $data['resetHour'] : null)
            ->withRepeat(array_key_exists('repeat', $data) && $data['repeat'] !== null ? $data['repeat'] : null)
            ->withRewards(array_map(
                function ($item) {
                    return Reward::fromJson($item);
                },
                array_key_exists('rewards', $data) && $data['rewards'] !== null ? $data['rewards'] : []
            ))
            ->withMissedReceiveRelief(array_key_exists('missedReceiveRelief', $data) && $data['missedReceiveRelief'] !== null ? $data['missedReceiveRelief'] : null)
            ->withMissedReceiveReliefVerifyActions(array_map(
                function ($item) {
                    return VerifyAction::fromJson($item);
                },
                array_key_exists('missedReceiveReliefVerifyActions', $data) && $data['missedReceiveReliefVerifyActions'] !== null ? $data['missedReceiveReliefVerifyActions'] : []
            ))
            ->withMissedReceiveReliefConsumeActions(array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                array_key_exists('missedReceiveReliefConsumeActions', $data) && $data['missedReceiveReliefConsumeActions'] !== null ? $data['missedReceiveReliefConsumeActions'] : []
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "bonusModelId" => $this->getBonusModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "mode" => $this->getMode(),
            "periodEventId" => $this->getPeriodEventId(),
            "resetHour" => $this->getResetHour(),
            "repeat" => $this->getRepeat(),
            "rewards" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getRewards() !== null && $this->getRewards() !== null ? $this->getRewards() : []
            ),
            "missedReceiveRelief" => $this->getMissedReceiveRelief(),
            "missedReceiveReliefVerifyActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getMissedReceiveReliefVerifyActions() !== null && $this->getMissedReceiveReliefVerifyActions() !== null ? $this->getMissedReceiveReliefVerifyActions() : []
            ),
            "missedReceiveReliefConsumeActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getMissedReceiveReliefConsumeActions() !== null && $this->getMissedReceiveReliefConsumeActions() !== null ? $this->getMissedReceiveReliefConsumeActions() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}