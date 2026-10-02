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
 * Quest Model
 *
 * @see https://docs.gs2.io/api_reference/quest/sdk/#questmodel
 */
class QuestModel implements IModel {
	/**
     * @var string Quest Model GRN
	 */
	private $questModelId;
	/**
     * @var string Quest Model name
	 */
	private $name;
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
    /** @return string|null Quest Model GRN */
	public function getQuestModelId(): ?string {
		return $this->questModelId;
	}
    /** @param string|null $questModelId Quest Model GRN */
	public function setQuestModelId(?string $questModelId) {
		$this->questModelId = $questModelId;
	}
    /**
     * @param string|null $questModelId Quest Model GRN
     * @return QuestModel
     */
	public function withQuestModelId(?string $questModelId): QuestModel {
		$this->questModelId = $questModelId;
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
     * @return QuestModel
     */
	public function withName(?string $name): QuestModel {
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
     * @return QuestModel
     */
	public function withMetadata(?string $metadata): QuestModel {
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
     * @return QuestModel
     */
	public function withContents(?array $contents): QuestModel {
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
     * @return QuestModel
     */
	public function withChallengePeriodEventId(?string $challengePeriodEventId): QuestModel {
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
     * @return QuestModel
     */
	public function withFirstCompleteAcquireActions(?array $firstCompleteAcquireActions): QuestModel {
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
     * @return QuestModel
     */
	public function withVerifyActions(?array $verifyActions): QuestModel {
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
     * @return QuestModel
     */
	public function withConsumeActions(?array $consumeActions): QuestModel {
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
     * @return QuestModel
     */
	public function withFailedAcquireActions(?array $failedAcquireActions): QuestModel {
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
     * @return QuestModel
     */
	public function withPremiseQuestNames(?array $premiseQuestNames): QuestModel {
		$this->premiseQuestNames = $premiseQuestNames;
		return $this;
	}

    public static function fromJson(?array $data): ?QuestModel {
        if ($data === null) {
            return null;
        }
        return (new QuestModel())
            ->withQuestModelId(array_key_exists('questModelId', $data) && $data['questModelId'] !== null ? $data['questModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
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
            ));
    }

    public function toJson(): array {
        return array(
            "questModelId" => $this->getQuestModelId(),
            "name" => $this->getName(),
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
        );
    }
}