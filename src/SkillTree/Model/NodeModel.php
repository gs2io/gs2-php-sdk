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

namespace Gs2\SkillTree\Model;

use Gs2\Core\Model\IModel;


/**
 * Node Model
 *
 * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#nodemodel
 */
class NodeModel implements IModel {
	/**
     * @var string Node Model GRN
	 */
	private $nodeModelId;
	/**
     * @var string Node Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var array List of Release Verify Actions
	 */
	private $releaseVerifyActions;
	/**
     * @var array Release Consume Actions
	 */
	private $releaseConsumeActions;
	/**
     * @var array Return Acquire Actions
	 */
	private $returnAcquireActions;
	/**
     * @var float Restrain Return Rate
	 */
	private $restrainReturnRate;
	/**
     * @var array List of Premise Node Names
	 */
	private $premiseNodeNames;
    /** @return string|null Node Model GRN */
	public function getNodeModelId(): ?string {
		return $this->nodeModelId;
	}
    /** @param string|null $nodeModelId Node Model GRN */
	public function setNodeModelId(?string $nodeModelId) {
		$this->nodeModelId = $nodeModelId;
	}
    /**
     * @param string|null $nodeModelId Node Model GRN
     * @return NodeModel
     */
	public function withNodeModelId(?string $nodeModelId): NodeModel {
		$this->nodeModelId = $nodeModelId;
		return $this;
	}
    /** @return string|null Node Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Node Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Node Model name
     * @return NodeModel
     */
	public function withName(?string $name): NodeModel {
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
     * @return NodeModel
     */
	public function withMetadata(?string $metadata): NodeModel {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null List of Release Verify Actions */
	public function getReleaseVerifyActions(): ?array {
		return $this->releaseVerifyActions;
	}
    /** @param array|null $releaseVerifyActions List of Release Verify Actions */
	public function setReleaseVerifyActions(?array $releaseVerifyActions) {
		$this->releaseVerifyActions = $releaseVerifyActions;
	}
    /**
     * @param array|null $releaseVerifyActions List of Release Verify Actions
     * @return NodeModel
     */
	public function withReleaseVerifyActions(?array $releaseVerifyActions): NodeModel {
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
     * @return NodeModel
     */
	public function withReleaseConsumeActions(?array $releaseConsumeActions): NodeModel {
		$this->releaseConsumeActions = $releaseConsumeActions;
		return $this;
	}
    /** @return array|null Return Acquire Actions */
	public function getReturnAcquireActions(): ?array {
		return $this->returnAcquireActions;
	}
    /** @param array|null $returnAcquireActions Return Acquire Actions */
	public function setReturnAcquireActions(?array $returnAcquireActions) {
		$this->returnAcquireActions = $returnAcquireActions;
	}
    /**
     * @param array|null $returnAcquireActions Return Acquire Actions
     * @return NodeModel
     */
	public function withReturnAcquireActions(?array $returnAcquireActions): NodeModel {
		$this->returnAcquireActions = $returnAcquireActions;
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
     * @return NodeModel
     */
	public function withRestrainReturnRate(?float $restrainReturnRate): NodeModel {
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
     * @return NodeModel
     */
	public function withPremiseNodeNames(?array $premiseNodeNames): NodeModel {
		$this->premiseNodeNames = $premiseNodeNames;
		return $this;
	}

    public static function fromJson(?array $data): ?NodeModel {
        if ($data === null) {
            return null;
        }
        return (new NodeModel())
            ->withNodeModelId(array_key_exists('nodeModelId', $data) && $data['nodeModelId'] !== null ? $data['nodeModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
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
            ->withReturnAcquireActions(!array_key_exists('returnAcquireActions', $data) || $data['returnAcquireActions'] === null ? null : array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                $data['returnAcquireActions']
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
            "nodeModelId" => $this->getNodeModelId(),
            "name" => $this->getName(),
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
            "returnAcquireActions" => $this->getReturnAcquireActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getReturnAcquireActions()
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