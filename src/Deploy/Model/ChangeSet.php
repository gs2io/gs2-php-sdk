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

namespace Gs2\Deploy\Model;

use Gs2\Core\Model\IModel;


/**
 * Change Details
 *
 * @see https://docs.gs2.io/api_reference/deploy/sdk/#changeset
 */
class ChangeSet implements IModel {
	/**
     * @var string Resource name
	 */
	private $resourceName;
	/**
     * @var string Resource type
	 */
	private $resourceType;
	/**
     * @var string Change type
	 */
	private $operation;
    /** @return string|null Resource name */
	public function getResourceName(): ?string {
		return $this->resourceName;
	}
    /** @param string|null $resourceName Resource name */
	public function setResourceName(?string $resourceName) {
		$this->resourceName = $resourceName;
	}
    /**
     * @param string|null $resourceName Resource name
     * @return ChangeSet
     */
	public function withResourceName(?string $resourceName): ChangeSet {
		$this->resourceName = $resourceName;
		return $this;
	}
    /** @return string|null Resource type */
	public function getResourceType(): ?string {
		return $this->resourceType;
	}
    /** @param string|null $resourceType Resource type */
	public function setResourceType(?string $resourceType) {
		$this->resourceType = $resourceType;
	}
    /**
     * @param string|null $resourceType Resource type
     * @return ChangeSet
     */
	public function withResourceType(?string $resourceType): ChangeSet {
		$this->resourceType = $resourceType;
		return $this;
	}
    /** @return string|null Change type */
	public function getOperation(): ?string {
		return $this->operation;
	}
    /** @param string|null $operation Change type */
	public function setOperation(?string $operation) {
		$this->operation = $operation;
	}
    /**
     * @param string|null $operation Change type
     * @return ChangeSet
     */
	public function withOperation(?string $operation): ChangeSet {
		$this->operation = $operation;
		return $this;
	}

    public static function fromJson(?array $data): ?ChangeSet {
        if ($data === null) {
            return null;
        }
        return (new ChangeSet())
            ->withResourceName(array_key_exists('resourceName', $data) && $data['resourceName'] !== null ? $data['resourceName'] : null)
            ->withResourceType(array_key_exists('resourceType', $data) && $data['resourceType'] !== null ? $data['resourceType'] : null)
            ->withOperation(array_key_exists('operation', $data) && $data['operation'] !== null ? $data['operation'] : null);
    }

    public function toJson(): array {
        return array(
            "resourceName" => $this->getResourceName(),
            "resourceType" => $this->getResourceType(),
            "operation" => $this->getOperation(),
        );
    }
}