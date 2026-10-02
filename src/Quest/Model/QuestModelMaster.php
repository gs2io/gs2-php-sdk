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

namespace Gs2\Quest\Model;

use Gs2\Core\Model\IModel;


/**
 * Quest Model Master
 *
 * @see https://docs.gs2.io/api_reference/quest/sdk/#questmodelmaster
 */
class QuestModelMaster implements IModel {
	/**
     * @var string Quest Model Master GRN
	 */
	private $questModelId;
	/**
     * @var string Quest Group Model name
	 */
	private $questGroupName;
	/**
     * @var string Quest Model name
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
     * @var array Quest content variations
	 */
	private $contents;
	/**
     * @var string Challenge Period Event GRN
	 */
	private $challengePeriodEventId;
	/**
     * @var array First Completion Acquire Actions
	 */
	private $firstCompleteAcquireActions;
	/**
     * @var array List of Verify Actions
	 */
	private $verifyActions;
	/**
     * @var array List of Acquire Actions
	 */
	private $consumeActions;
	/**
     * @var array Failed Acquire Actions
	 */
	private $failedAcquireActions;
	/**
     * @var array Prerequisite Quest Names
	 */
	private $premiseQuestNames;
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
    /** @return string|null Quest Model Master GRN */
	public function getQuestModelId(): ?string {
		return $this->questModelId;
	}
    /** @param string|null $questModelId Quest Model Master GRN */
	public function setQuestModelId(?string $questModelId) {
		$this->questModelId = $questModelId;
	}
    /**
     * @param string|null $questModelId Quest Model Master GRN
     * @return QuestModelMaster
     */
	public function withQuestModelId(?string $questModelId): QuestModelMaster {
		$this->questModelId = $questModelId;
		return $this;
	}
    /** @return string|null Quest Group Model name */
	public function getQuestGroupName(): ?string {
		return $this->questGroupName;
	}
    /** @param string|null $questGroupName Quest Group Model name */
	public function setQuestGroupName(?string $questGroupName) {
		$this->questGroupName = $questGroupName;
	}
    /**
     * @param string|null $questGroupName Quest Group Model name
     * @return QuestModelMaster
     */
	public function withQuestGroupName(?string $questGroupName): QuestModelMaster {
		$this->questGroupName = $questGroupName;
		return $this;
	}
    /** @return string|null Quest Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Quest Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Quest Model name
     * @return QuestModelMaster
     */
	public function withName(?string $name): QuestModelMaster {
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
     * @return QuestModelMaster
     */
	public function withDescription(?string $description): QuestModelMaster {
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
     * @return QuestModelMaster
     */
	public function withMetadata(?string $metadata): QuestModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null Quest content variations */
	public function getContents(): ?array {
		return $this->contents;
	}
    /** @param array|null $contents Quest content variations */
	public function setContents(?array $contents) {
		$this->contents = $contents;
	}
    /**
     * @param array|null $contents Quest content variations
     * @return QuestModelMaster
     */
	public function withContents(?array $contents): QuestModelMaster {
		$this->contents = $contents;
		return $this;
	}
    /** @return string|null Challenge Period Event GRN */
	public function getChallengePeriodEventId(): ?string {
		return $this->challengePeriodEventId;
	}
    /** @param string|null $challengePeriodEventId Challenge Period Event GRN */
	public function setChallengePeriodEventId(?string $challengePeriodEventId) {
		$this->challengePeriodEventId = $challengePeriodEventId;
	}
    /**
     * @param string|null $challengePeriodEventId Challenge Period Event GRN
     * @return QuestModelMaster
     */
	public function withChallengePeriodEventId(?string $challengePeriodEventId): QuestModelMaster {
		$this->challengePeriodEventId = $challengePeriodEventId;
		return $this;
	}
    /** @return array|null First Completion Acquire Actions */
	public function getFirstCompleteAcquireActions(): ?array {
		return $this->firstCompleteAcquireActions;
	}
    /** @param array|null $firstCompleteAcquireActions First Completion Acquire Actions */
	public function setFirstCompleteAcquireActions(?array $firstCompleteAcquireActions) {
		$this->firstCompleteAcquireActions = $firstCompleteAcquireActions;
	}
    /**
     * @param array|null $firstCompleteAcquireActions First Completion Acquire Actions
     * @return QuestModelMaster
     */
	public function withFirstCompleteAcquireActions(?array $firstCompleteAcquireActions): QuestModelMaster {
		$this->firstCompleteAcquireActions = $firstCompleteAcquireActions;
		return $this;
	}
    /** @return array|null List of Verify Actions */
	public function getVerifyActions(): ?array {
		return $this->verifyActions;
	}
    /** @param array|null $verifyActions List of Verify Actions */
	public function setVerifyActions(?array $verifyActions) {
		$this->verifyActions = $verifyActions;
	}
    /**
     * @param array|null $verifyActions List of Verify Actions
     * @return QuestModelMaster
     */
	public function withVerifyActions(?array $verifyActions): QuestModelMaster {
		$this->verifyActions = $verifyActions;
		return $this;
	}
    /** @return array|null List of Acquire Actions */
	public function getConsumeActions(): ?array {
		return $this->consumeActions;
	}
    /** @param array|null $consumeActions List of Acquire Actions */
	public function setConsumeActions(?array $consumeActions) {
		$this->consumeActions = $consumeActions;
	}
    /**
     * @param array|null $consumeActions List of Acquire Actions
     * @return QuestModelMaster
     */
	public function withConsumeActions(?array $consumeActions): QuestModelMaster {
		$this->consumeActions = $consumeActions;
		return $this;
	}
    /** @return array|null Failed Acquire Actions */
	public function getFailedAcquireActions(): ?array {
		return $this->failedAcquireActions;
	}
    /** @param array|null $failedAcquireActions Failed Acquire Actions */
	public function setFailedAcquireActions(?array $failedAcquireActions) {
		$this->failedAcquireActions = $failedAcquireActions;
	}
    /**
     * @param array|null $failedAcquireActions Failed Acquire Actions
     * @return QuestModelMaster
     */
	public function withFailedAcquireActions(?array $failedAcquireActions): QuestModelMaster {
		$this->failedAcquireActions = $failedAcquireActions;
		return $this;
	}
    /** @return array|null Prerequisite Quest Names */
	public function getPremiseQuestNames(): ?array {
		return $this->premiseQuestNames;
	}
    /** @param array|null $premiseQuestNames Prerequisite Quest Names */
	public function setPremiseQuestNames(?array $premiseQuestNames) {
		$this->premiseQuestNames = $premiseQuestNames;
	}
    /**
     * @param array|null $premiseQuestNames Prerequisite Quest Names
     * @return QuestModelMaster
     */
	public function withPremiseQuestNames(?array $premiseQuestNames): QuestModelMaster {
		$this->premiseQuestNames = $premiseQuestNames;
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
     * @return QuestModelMaster
     */
	public function withCreatedAt(?int $createdAt): QuestModelMaster {
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
     * @return QuestModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): QuestModelMaster {
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
     * @return QuestModelMaster
     */
	public function withRevision(?int $revision): QuestModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?QuestModelMaster {
        if ($data === null) {
            return null;
        }
        return (new QuestModelMaster())
            ->withQuestModelId(array_key_exists('questModelId', $data) && $data['questModelId'] !== null ? $data['questModelId'] : null)
            ->withQuestGroupName(array_key_exists('questGroupName', $data) && $data['questGroupName'] !== null ? $data['questGroupName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withContents(!array_key_exists('contents', $data) || $data['contents'] === null ? null : array_map(
                function ($item) {
                    return Contents::fromJson($item);
                },
                $data['contents']
            ))
            ->withChallengePeriodEventId(array_key_exists('challengePeriodEventId', $data) && $data['challengePeriodEventId'] !== null ? $data['challengePeriodEventId'] : null)
            ->withFirstCompleteAcquireActions(!array_key_exists('firstCompleteAcquireActions', $data) || $data['firstCompleteAcquireActions'] === null ? null : array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                $data['firstCompleteAcquireActions']
            ))
            ->withVerifyActions(!array_key_exists('verifyActions', $data) || $data['verifyActions'] === null ? null : array_map(
                function ($item) {
                    return VerifyAction::fromJson($item);
                },
                $data['verifyActions']
            ))
            ->withConsumeActions(!array_key_exists('consumeActions', $data) || $data['consumeActions'] === null ? null : array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                $data['consumeActions']
            ))
            ->withFailedAcquireActions(!array_key_exists('failedAcquireActions', $data) || $data['failedAcquireActions'] === null ? null : array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                $data['failedAcquireActions']
            ))
            ->withPremiseQuestNames(!array_key_exists('premiseQuestNames', $data) || $data['premiseQuestNames'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['premiseQuestNames']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "questModelId" => $this->getQuestModelId(),
            "questGroupName" => $this->getQuestGroupName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "contents" => $this->getContents() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getContents()
            ),
            "challengePeriodEventId" => $this->getChallengePeriodEventId(),
            "firstCompleteAcquireActions" => $this->getFirstCompleteAcquireActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getFirstCompleteAcquireActions()
            ),
            "verifyActions" => $this->getVerifyActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getVerifyActions()
            ),
            "consumeActions" => $this->getConsumeActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConsumeActions()
            ),
            "failedAcquireActions" => $this->getFailedAcquireActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getFailedAcquireActions()
            ),
            "premiseQuestNames" => $this->getPremiseQuestNames() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getPremiseQuestNames()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}