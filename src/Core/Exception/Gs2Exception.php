<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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
namespace Gs2\Core\Exception;

use Gs2\Core\Model\RequestError;
use RuntimeException;

abstract class Gs2Exception extends RuntimeException {

    /**
     * @var array<RequestError>
     */
	protected $errors = [];

    /**
     * コンストラクタ
     *
     * @param string|array $message エラーリスト
     */
    function __construct(string $message) {
        parent::__construct($message);

        $errors = json_decode($message, true);
        if ($errors) {
            foreach ($errors as $error) {
                $e = new RequestError();
                $e->setComponent($error["component"]);
                $e->setMessage($error["message"]);
                array_push($this->errors, $e);
            }
        }
	}

    /**
     * エラーリストを取得する
     *
     * @return RequestError[] エラーリスト
     */
	function getErrors(): array {
		return $this->errors;
	}

    /**
     * {@inheritDoc}
     * @see Exception::__toString()
     */
    function __toString() {
        return json_encode($this->errors);
    }
}
