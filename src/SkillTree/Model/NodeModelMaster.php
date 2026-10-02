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
 * Node Model Master
 *
 * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#nodemodelmaster
 */
class NodeModelMaster implements IModel {
	/**
     * @var string Node Model Master GRN
	 */
	private $nodeModelId;
	/**
     * @var string Node Model name
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
     * @var array list of Release Verify Actions
	 */
	private $releaseVerifyActions;
	/**
     * @var array Release Consume Actions
	 */
	private $releaseConsumeActions;
	/**
     * @var float Restrain Return Rate
	 */
	private $restrainReturnRate;
	/**
     * @var array List of Premise Node Names
	 */
	private $premiseNodeNames;
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
    /** @return string|null Node Model Master GRN */
	public function getNodeModelId(): ?string {
		return $this->nodeModelId;
	}
    /** @param string|null $nodeModelId Node Model Master GRN */
	public function setNodeModelId(?string $nodeModelId) {
		$this->nodeModelId = $nodeModelId;
	}
    /**
     * @param string|null $nodeModelId Node Model Master GRN
     * @return NodeModelMaster
     */
	public function withNodeModelId(?string $nodeModelId): NodeModelMaster {
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
     * @return NodeModelMaster
     */
	public function withName(?string $name): NodeModelMaster {
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
     * @return NodeModelMaster
     */
	public function withDescription(?string $description): NodeModelMaster {
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
     * @return NodeModelMaster
     */
	public function withMetadata(?string $metadata): NodeModelMaster {
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
     * @return NodeModelMaster
     */
	public function withReleaseVerifyActions(?array $releaseVerifyActions): NodeModelMaster {
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
     * @return NodeModelMaster
     */
	public function withReleaseConsumeActions(?array $releaseConsumeActions): NodeModelMaster {
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
     * @return NodeModelMaster
     */
	public function withRestrainReturnRate(?float $restrainReturnRate): NodeModelMaster {
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
     * @return NodeModelMaster
     */
	public function withPremiseNodeNames(?array $premiseNodeNames): NodeModelMaster {
		$this->premiseNodeNames = $premiseNodeNames;
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
     * @return NodeModelMaster
     */
	public function withCreatedAt(?int $createdAt): NodeModelMaster {
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
     * @return NodeModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): NodeModelMaster {
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
     * @return NodeModelMaster
     */
	public function withRevision(?int $revision): NodeModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?NodeModelMaster {
        if ($data === null) {
            return null;
        }
        return (new NodeModelMaster())
            ->withNodeModelId(array_key_exists('nodeModelId', $data) && $data['nodeModelId'] !== null ? $data['nodeModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
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
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "nodeModelId" => $this->getNodeModelId(),
            "name" => $this->getName(),
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
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}