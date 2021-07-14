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

namespace Gs2\Datastore\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class PrepareReUploadRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $dataObjectName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $contentType;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): PrepareReUploadRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getDataObjectName(): ?string {
		return $this->dataObjectName;
	}

	public function setDataObjectName(?string $dataObjectName) {
		$this->dataObjectName = $dataObjectName;
	}

	public function withDataObjectName(?string $dataObjectName): PrepareReUploadRequest {
		$this->dataObjectName = $dataObjectName;
		return $this;
	}

	public function getAccessToken(): ?string {
		return $this->accessToken;
	}

	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}

	public function withAccessToken(?string $accessToken): PrepareReUploadRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

	public function getContentType(): ?string {
		return $this->contentType;
	}

	public function setContentType(?string $contentType) {
		$this->contentType = $contentType;
	}

	public function withContentType(?string $contentType): PrepareReUploadRequest {
		$this->contentType = $contentType;
		return $this;
	}

    public static function fromJson(?array $data): ?PrepareReUploadRequest {
        if ($data === null) {
            return null;
        }
        return (new PrepareReUploadRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withDataObjectName(empty($data['dataObjectName']) ? null : $data['dataObjectName'])
            ->withAccessToken(empty($data['accessToken']) ? null : $data['accessToken'])
            ->withContentType(empty($data['contentType']) ? null : $data['contentType']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "dataObjectName" => $this->getDataObjectName(),
            "accessToken" => $this->getAccessToken(),
            "contentType" => $this->getContentType(),
        );
    }
}