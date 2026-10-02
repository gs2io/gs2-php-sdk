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

namespace Gs2\News\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getProgress: Get content generation progress
 *
 * @see https://docs.gs2.io/api_reference/news/sdk/#getprogress
 */
class GetProgressRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Upload Token */
    private $uploadToken;
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
     * @return GetProgressRequest
     */
	public function withNamespaceName(?string $namespaceName): GetProgressRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Upload Token */
	public function getUploadToken(): ?string {
		return $this->uploadToken;
	}
    /** @param string|null $uploadToken Upload Token */
	public function setUploadToken(?string $uploadToken) {
		$this->uploadToken = $uploadToken;
	}
    /**
     * @param string|null $uploadToken Upload Token
     * @return GetProgressRequest
     */
	public function withUploadToken(?string $uploadToken): GetProgressRequest {
		$this->uploadToken = $uploadToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetProgressRequest {
        if ($data === null) {
            return null;
        }
        return (new GetProgressRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUploadToken(array_key_exists('uploadToken', $data) && $data['uploadToken'] !== null ? $data['uploadToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "uploadToken" => $this->getUploadToken(),
        );
    }
}