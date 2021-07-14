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

namespace Gs2\Version\Result;

use Gs2\Core\Model\IResult;
use Gs2\Version\Model\Version;
use Gs2\Version\Model\VersionModel;
use Gs2\Version\Model\Status;

class CheckVersionByUserIdResult implements IResult {
    /** @var string */
    private $projectToken;
    /** @var array */
    private $warnings;
    /** @var array */
    private $errors;

	public function getProjectToken(): ?string {
		return $this->projectToken;
	}

	public function setProjectToken(?string $projectToken) {
		$this->projectToken = $projectToken;
	}

	public function withProjectToken(?string $projectToken): CheckVersionByUserIdResult {
		$this->projectToken = $projectToken;
		return $this;
	}

	public function getWarnings(): ?array {
		return $this->warnings;
	}

	public function setWarnings(?array $warnings) {
		$this->warnings = $warnings;
	}

	public function withWarnings(?array $warnings): CheckVersionByUserIdResult {
		$this->warnings = $warnings;
		return $this;
	}

	public function getErrors(): ?array {
		return $this->errors;
	}

	public function setErrors(?array $errors) {
		$this->errors = $errors;
	}

	public function withErrors(?array $errors): CheckVersionByUserIdResult {
		$this->errors = $errors;
		return $this;
	}

    public static function fromJson(?array $data): ?CheckVersionByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new CheckVersionByUserIdResult())
            ->withProjectToken(empty($data['projectToken']) ? null : $data['projectToken'])
            ->withWarnings(array_map(
                function ($item) {
                    return Status::fromJson($item);
                },
                array_key_exists('warnings', $data) && $data['warnings'] !== null ? $data['warnings'] : []
            ))
            ->withErrors(array_map(
                function ($item) {
                    return Status::fromJson($item);
                },
                array_key_exists('errors', $data) && $data['errors'] !== null ? $data['errors'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "projectToken" => $this->getProjectToken(),
            "warnings" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getWarnings() !== null && $this->getWarnings() !== null ? $this->getWarnings() : []
            ),
            "errors" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getErrors() !== null && $this->getErrors() !== null ? $this->getErrors() : []
            ),
        );
    }
}