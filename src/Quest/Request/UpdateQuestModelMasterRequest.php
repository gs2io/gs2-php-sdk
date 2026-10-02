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

namespace Gs2\Quest\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Quest\Model\AcquireAction;
use Gs2\Quest\Model\Contents;
use Gs2\Quest\Model\VerifyAction;
use Gs2\Quest\Model\ConsumeAction;

/**
 * Request for updateQuestModelMaster: Update Quest Model Master
 *
 * @see https://docs.gs2.io/api_reference/quest/sdk/#updatequestmodelmaster
 */
class UpdateQuestModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Quest Group Model name */
    private $questGroupName;
    /** @var string Quest Model name */
    private $questName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var array Quest content variations */
    private $contents;
    /** @var string Challenge Period Event GRN */
    private $challengePeriodEventId;
    /** @var array First Completion Acquire Actions */
    private $firstCompleteAcquireActions;
    /** @var array List of Verify Actions */
    private $verifyActions;
    /** @var array List of Acquire Actions */
    private $consumeActions;
    /** @var array Failed Acquire Actions */
    private $failedAcquireActions;
    /** @var array Prerequisite Quest Names */
    private $premiseQuestNames;
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
     * @return UpdateQuestModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateQuestModelMasterRequest {
		$this->namespaceName = $namespaceName;
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
     * @return UpdateQuestModelMasterRequest
     */
	public function withQuestGroupName(?string $questGroupName): UpdateQuestModelMasterRequest {
		$this->questGroupName = $questGroupName;
		return $this;
	}
    /** @return string|null Quest Model name */
	public function getQuestName(): ?string {
		return $this->questName;
	}
    /** @param string|null $questName Quest Model name */
	public function setQuestName(?string $questName) {
		$this->questName = $questName;
	}
    /**
     * @param string|null $questName Quest Model name
     * @return UpdateQuestModelMasterRequest
     */
	public function withQuestName(?string $questName): UpdateQuestModelMasterRequest {
		$this->questName = $questName;
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
     * @return UpdateQuestModelMasterRequest
     */
	public function withDescription(?string $description): UpdateQuestModelMasterRequest {
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
     * @return UpdateQuestModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateQuestModelMasterRequest {
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
     * @return UpdateQuestModelMasterRequest
     */
	public function withContents(?array $contents): UpdateQuestModelMasterRequest {
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
     * @return UpdateQuestModelMasterRequest
     */
	public function withChallengePeriodEventId(?string $challengePeriodEventId): UpdateQuestModelMasterRequest {
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
     * @return UpdateQuestModelMasterRequest
     */
	public function withFirstCompleteAcquireActions(?array $firstCompleteAcquireActions): UpdateQuestModelMasterRequest {
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
     * @return UpdateQuestModelMasterRequest
     */
	public function withVerifyActions(?array $verifyActions): UpdateQuestModelMasterRequest {
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
     * @return UpdateQuestModelMasterRequest
     */
	public function withConsumeActions(?array $consumeActions): UpdateQuestModelMasterRequest {
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
     * @return UpdateQuestModelMasterRequest
     */
	public function withFailedAcquireActions(?array $failedAcquireActions): UpdateQuestModelMasterRequest {
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
     * @return UpdateQuestModelMasterRequest
     */
	public function withPremiseQuestNames(?array $premiseQuestNames): UpdateQuestModelMasterRequest {
		$this->premiseQuestNames = $premiseQuestNames;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateQuestModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateQuestModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withQuestGroupName(array_key_exists('questGroupName', $data) && $data['questGroupName'] !== null ? $data['questGroupName'] : null)
            ->withQuestName(array_key_exists('questName', $data) && $data['questName'] !== null ? $data['questName'] : null)
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
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "questGroupName" => $this->getQuestGroupName(),
            "questName" => $this->getQuestName(),
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
        );
    }
}