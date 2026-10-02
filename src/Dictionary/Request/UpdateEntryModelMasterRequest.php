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

namespace Gs2\Dictionary\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for updateEntryModelMaster: Update Entry Model Master
 *
 * @see https://docs.gs2.io/api_reference/dictionary/sdk/#updateentrymodelmaster
 */
class UpdateEntryModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Entry Model name */
    private $entryName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
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
     * @return UpdateEntryModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateEntryModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Entry Model name */
	public function getEntryName(): ?string {
		return $this->entryName;
	}
    /** @param string|null $entryName Entry Model name */
	public function setEntryName(?string $entryName) {
		$this->entryName = $entryName;
	}
    /**
     * @param string|null $entryName Entry Model name
     * @return UpdateEntryModelMasterRequest
     */
	public function withEntryName(?string $entryName): UpdateEntryModelMasterRequest {
		$this->entryName = $entryName;
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
     * @return UpdateEntryModelMasterRequest
     */
	public function withDescription(?string $description): UpdateEntryModelMasterRequest {
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
     * @return UpdateEntryModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateEntryModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateEntryModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateEntryModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withEntryName(array_key_exists('entryName', $data) && $data['entryName'] !== null ? $data['entryName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "entryName" => $this->getEntryName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
        );
    }
}