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

namespace Gs2\SkillTree\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\SkillTree\Model\VerifyAction;
use Gs2\SkillTree\Model\ConsumeAction;

/**
 * Request for updateNodeModelMaster: Update Node Model Master
 *
 * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#updatenodemodelmaster
 */
class UpdateNodeModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Node Model name */
    private $nodeModelName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var array list of Release Verify Actions */
    private $releaseVerifyActions;
    /** @var array Release Consume Actions */
    private $releaseConsumeActions;
    /** @var float Restrain Return Rate */
    private $restrainReturnRate;
    /** @var array List of Premise Node Names */
    private $premiseNodeNames;
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
     * @return UpdateNodeModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateNodeModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Node Model name */
	public function getNodeModelName(): ?string {
		return $this->nodeModelName;
	}
    /** @param string|null $nodeModelName Node Model name */
	public function setNodeModelName(?string $nodeModelName) {
		$this->nodeModelName = $nodeModelName;
	}
    /**
     * @param string|null $nodeModelName Node Model name
     * @return UpdateNodeModelMasterRequest
     */
	public function withNodeModelName(?string $nodeModelName): UpdateNodeModelMasterRequest {
		$this->nodeModelName = $nodeModelName;
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
     * @return UpdateNodeModelMasterRequest
     */
	public function withDescription(?string $description): UpdateNodeModelMasterRequest {
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
     * @return UpdateNodeModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateNodeModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null list of Release Verify Actions */
	public function getReleaseVerifyActions(): ?array {
		return $this->releaseVerifyActions;
	}
    /** @param array|null $releaseVerifyActions list of Release Verify Actions */
	public function setReleaseVerifyActions(?array $releaseVerifyActions) {
		$this->releaseVerifyActions = $releaseVerifyActions;
	}
    /**
     * @param array|null $releaseVerifyActions list of Release Verify Actions
     * @return UpdateNodeModelMasterRequest
     */
	public function withReleaseVerifyActions(?array $releaseVerifyActions): UpdateNodeModelMasterRequest {
		$this->releaseVerifyActions = $releaseVerifyActions;
		return $this;
	}
    /** @return array|null Release Consume Actions */
	public function getReleaseConsumeActions(): ?array {
		return $this->releaseConsumeActions;
	}
    /** @param array|null $releaseConsumeActions Release Consume Actions */
	public function setReleaseConsumeActions(?array $releaseConsumeActions) {
		$this->releaseConsumeActions = $releaseConsumeActions;
	}
    /**
     * @param array|null $releaseConsumeActions Release Consume Actions
     * @return UpdateNodeModelMasterRequest
     */
	public function withReleaseConsumeActions(?array $releaseConsumeActions): UpdateNodeModelMasterRequest {
		$this->releaseConsumeActions = $releaseConsumeActions;
		return $this;
	}
    /** @return float|null Restrain Return Rate */
	public function getRestrainReturnRate(): ?float {
		return $this->restrainReturnRate;
	}
    /** @param float|null $restrainReturnRate Restrain Return Rate */
	public function setRestrainReturnRate(?float $restrainReturnRate) {
		$this->restrainReturnRate = $restrainReturnRate;
	}
    /**
     * @param float|null $restrainReturnRate Restrain Return Rate
     * @return UpdateNodeModelMasterRequest
     */
	public function withRestrainReturnRate(?float $restrainReturnRate): UpdateNodeModelMasterRequest {
		$this->restrainReturnRate = $restrainReturnRate;
		return $this;
	}
    /** @return array|null List of Premise Node Names */
	public function getPremiseNodeNames(): ?array {
		return $this->premiseNodeNames;
	}
    /** @param array|null $premiseNodeNames List of Premise Node Names */
	public function setPremiseNodeNames(?array $premiseNodeNames) {
		$this->premiseNodeNames = $premiseNodeNames;
	}
    /**
     * @param array|null $premiseNodeNames List of Premise Node Names
     * @return UpdateNodeModelMasterRequest
     */
	public function withPremiseNodeNames(?array $premiseNodeNames): UpdateNodeModelMasterRequest {
		$this->premiseNodeNames = $premiseNodeNames;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateNodeModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateNodeModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withNodeModelName(array_key_exists('nodeModelName', $data) && $data['nodeModelName'] !== null ? $data['nodeModelName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withReleaseVerifyActions(!array_key_exists('releaseVerifyActions', $data) || $data['releaseVerifyActions'] === null ? null : array_map(
                function ($item) {
                    return VerifyAction::fromJson($item);
                },
                $data['releaseVerifyActions']
            ))
            ->withReleaseConsumeActions(!array_key_exists('releaseConsumeActions', $data) || $data['releaseConsumeActions'] === null ? null : array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                $data['releaseConsumeActions']
            ))
            ->withRestrainReturnRate(array_key_exists('restrainReturnRate', $data) && $data['restrainReturnRate'] !== null ? $data['restrainReturnRate'] : null)
            ->withPremiseNodeNames(!array_key_exists('premiseNodeNames', $data) || $data['premiseNodeNames'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['premiseNodeNames']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "nodeModelName" => $this->getNodeModelName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "releaseVerifyActions" => $this->getReleaseVerifyActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getReleaseVerifyActions()
            ),
            "releaseConsumeActions" => $this->getReleaseConsumeActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getReleaseConsumeActions()
            ),
            "restrainReturnRate" => $this->getRestrainReturnRate(),
            "premiseNodeNames" => $this->getPremiseNodeNames() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getPremiseNodeNames()
            ),
        );
    }
}