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

class UpdateEntryModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $entryName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): UpdateEntryModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getEntryName(): ?string {
		return $this->entryName;
	}

	public function setEntryName(?string $entryName) {
		$this->entryName = $entryName;
	}

	public function withEntryName(?string $entryName): UpdateEntryModelMasterRequest {
		$this->entryName = $entryName;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): UpdateEntryModelMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

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